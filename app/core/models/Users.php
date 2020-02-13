<?php
class Users extends QueryBuilder
{
    //public $table;
    // public $col_name = [];
    // public $col_values = [];
    public function __construct($pdo)

    {
        parent::__construct($pdo);
        $this->table = 'users';
        $this->col_name = array('id', 'provider', 'activated', 'name', 'email', 'password', 'user_type', 'hash', 'created_at');
        $this->values = array('email', 'hash');
        // $this->param_values = [];
    }

    public function listUsers()
    {
        return parent::list($this->table, $this->col_name);
    }

    public function insertUsers($name, $email, $password)
    {
        // $name = trim($_POST['name']);
        // $email = trim($_POST['email']);
        // $password = $_POST['password'];
        $secured_pass = password_hash($password, PASSWORD_BCRYPT);
        $credentials = [];
        $credentials[0] = "'" . trim($_POST['name']) . "'";
        $credentials[1] = "'" . trim($_POST['email']) . "'";
        $credentials[2] = "'" . $secured_pass . "'";
        $credentials[3] = "'" . "Reader" . "'";
        $verify_password =  $_POST['verify_password'];
        array_pop($this->values);
        $select = parent::select($this->table, $this->col_name, $this->values, $email);
        $select->execute();
        if ($select->rowcount() == 0) {
            if ($password != $verify_password) {
                session_start();
                $pass_err = "Password do not match";
                $_SESSION["err"] = $pass_err;
                header('location:/signup');
            } else {
                $hash = md5(rand(0, 1000));
                $credentials[4] = "'" . $hash . "'";
                array_shift($this->col_name);
                array_shift($this->col_name);
                array_shift($this->col_name);
                array_pop($this->col_name);
                $insert = parent::insert($this->table, $this->col_name, $credentials);
                $insert->execute();
                $lastID = $this->pdo->lastInsertId();
                $mail = new Mail();
                $mail->sendMail($lastID, $hash);
                header('location:/verifymail');
            }
        } else {
            session_start();
            $error = "Email Id already exists";
            $_SESSION["err"] = $error; 
            header('location:/signup');
        }
    }


    public function verifyUser($email)
    {
        $email_err = $password_err = $err_message = "";
        if (empty(trim($_POST["email"]))) {
            session_start();
            $email_err = "Please enter email";
            $_SESSION["err"] = $email_err;
            header('location:/');
        } else {
            $email = trim($_POST["email"]);
        }
        if (empty(trim($_POST["password"]))) {
            session_start();
            $password_err = "Please enter your password";
            $_SESSION["err"] = $password_err;
            header('location:/');
        } else {
            $password = $_POST["password"];
        }
        if (empty($_POST["email"]) && empty($_POST["password"])) {
            session_start();
            $error = "Please fill up the form";
            $_SESSION["err"] = $error;
            header('location:/');
        }
        if (empty($email_err) && empty($password_err)) {
            array_pop($this->values);
            $select = parent::select($this->table, $this->col_name, $this->values, $email);
            if ($select->execute()) {
                if ($select->rowcount() == 1) {
                    if ($row = $select->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $hashed_password = $row['password'];
                        $user_type = $row['user_type'];
                        if (password_verify($password, $hashed_password)) {
                            if ($row['activated']) {
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION["name"] = $name;
                                $_SESSION["email"] = $email;
                                $_SESSION["user_type"] = $user_type;
                                if ($_SESSION['user_type'] === 'Reader') {
                                    header("location:/user");
                                } else {
                                    header("location:/admin");
                                }
                            } else {
                                session_start();
                                $err_message = "Account not activated";
                                $_SESSION["err"] = $err_message;
                                header('location:/');
                            }
                        } else {
                            session_start();
                            $err_message = "The password you entered was not valid";
                            $_SESSION["err"] = $err_message;
                            header('location:/');
                        }
                    }
                } else {
                    session_start();
                    $err_message = "No account found with that email";
                    $_SESSION["err"] = $err_message;
                    header('location:/');
                }
            } else {
                session_start();
                $err_message = "Oops! something went wrong";
                $_SESSION["err"] = $err_message;
                header('location:/');
            }
        }
    }
    public function GLogin($name, $email)
    {
        array_pop($this->values);
        $stmt = parent::select($this->table, $this->col_name, $this->values, $email);
        if ($stmt->execute()) {
            $count = $stmt->rowcount();
            if ($count == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_type'] = $row['user_type'];
                if ($_SESSION['user_type'] == 'Reader') {
                    header('location:/user');
                } else {
                    header('location:/admin');
                }
            } else {
                $this->col_name = array('name', 'email', 'provider', 'activated');
                $name = "'" . $name . "'";
                $emailnew = "'" . $email . "'";
                $active = "1";
                $this->values = array($name, $emailnew, $emailnew, $active);
                $stmt = parent::insert($this->table, $this->col_name, $this->values);
                $stmt->execute();
                $this->values = array('email');
                array_unshift($this->col_name, 'id');
                array_push($this->col_name, 'user_type');
                $stmt = parent::select($this->table, $this->col_name, $this->values, $email);
                $stmt->execute();
                $count = $stmt->rowcount();
                if ($count == 1) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_type'] = $row['user_type'];
                    if ($_SESSION['user_type'] == 'Reader') {
                        header('location: /user');
                    } else {
                        header('location: /admin');
                    }
                }
            }
        }
    }
    public function GoogleAuth()
    {
        $googleData = App::get('config')['google'];
        $client = new Google_Client();
        $client->setClientId($googleData['GOOGLE_CLIENT_ID']);
        $client->setClientSecret($googleData['GOOGLE_CLIENT_SECRET']);
        $client->setRedirectUri($googleData['GOOGLE_REDIRECT_URL']);
        $client->addScope("email");
        $client->addScope("profile");

        //authenticate code from Google OAuth Flow
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            return $google_account_info;

            //now you can use this profile info to create account in your website and make user logged in.
        } else {
            return $client->createAuthUrl();
        }
    }

    public function activate($id, $hash)
    {
        array_shift($this->values);
        $stmt = parent::select($this->table, $this->col_name, $this->values, $hash);
        if ($stmt->execute()) {
            $count = $stmt->rowcount();
            if ($count == 1) {
                $stmt = parent::update($this->table, ['activated' => '1'], 'hash', $hash);
                return $stmt->execute();
            }
        }
    }
    public function deleteUser($id)
    {
        return parent::deleteAll($this->table, 'id', $id);
    }
    public function selectUser($id)
    {
        $this->values = array('id');
        return parent::select($this->table, $this->col_name, $this->values, $id);
    }
    public function fetchBooks($id)
    {
        $this->col_name = array('book_id');
        $this->values = array('user_id');
        return parent::select('has_book', $this->col_name, $this->values, $id);
    }
    public function readBook($uid, $bid)
    {
        $this->col_name = array('user_id', 'book_id');
        $user_id = "'" . $uid . "'";
        $book_id = "'" . $bid . "'";
        $this->values = array($user_id, $book_id);
        $insert = parent::insert('has_book', $this->col_name, $this->values);
        $insert->execute();
    }
    public function unreadBook($user_id, $book_id)
    {
        $delete = parent::delete('has_book', 'user_id', $user_id, 'book_id', $book_id);
        $delete->execute();
    }
    public function forgotPassword($email)
    {
        $this->values = array('email');
        $stmt = parent::select($this->table, $this->col_name, $this->values, $email);
        return $stmt;
    }
    public function resetPassword($hash, $email, $secured_password)
    {
        $this->values = array('hash');
        $stmt = parent::select($this->table, $this->col_name, $this->values, $hash);
        if ($stmt->execute()) {
            $count = $stmt->rowcount();
            var_dump($count);
            if ($count == 1) {
                $stmt = parent::update($this->table, ['password' => $secured_password], 'hash', $hash);
                return $stmt->execute();
            }
        }
    }
}
