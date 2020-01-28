<?php
class Users extends QueryBuilder
{
    //public $table;
    // public $col_name = [];
    // public $col_values = [];
    public function __construct($pdo)

    {
        parent::__construct($pdo);
        $this->table = 'user';
        $this->col_name = array('id', 'provider', 'provider_id', 'activated', 'name', 'email', 'password', 'user_type',  'hash');
        $this->values = array('email', 'hash');
        // $this->param_values = [];
    }

    public function listUsers()
    {
        return parent::list($this->table, $this->col_name);
    }

    // public function insertUsers()
    // {
    //     $name = trim($_POST['name']);
    //     $email = trim($_POST['email']);
    //     $password = $_POST['password'];
    //     $secured_pass = password_hash($password, PASSWORD_BCRYPT);
    //     parent::insert($this->table, $this->col_name);

    // }
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
        $credentials[3] = "'" . "reader" . "'";
        $verify_password =  $_POST['verify_password'];
        array_pop($this->values);
        $select = parent::select($this->table, $this->col_name, $this->values, $email);
        $select->execute();
        if ($select->rowcount() == 0) {
            if ($password != $verify_password) {
                echo 'Password do not match';
            } else {
                $hash = md5(rand(0, 1000));
                $credentials[4] = "'" . $hash . "'";
                array_shift($this->col_name);
                array_shift($this->col_name);
                array_shift($this->col_name);
                array_shift($this->col_name);
                $insert = parent::insert($this->table, $this->col_name, $credentials);
                $insert->execute();
                $lastID = $this->pdo->lastInsertId();
                $mail = new Mail();
                $mail->sendMail($lastID, $hash);
                echo 'You have signed up successfully';
            }
        } else {
            echo "Email Id already exists. Please use different Email Id";
        }
    }


    public function verifyUser($email)
    {
        // $email = $password = "";
        $email_err = $password_err = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter email";
            } else {
                $email = trim($_POST["email"]);
            }
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password";
            } else {
                $password = $_POST["password"];
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
                                    if ($_SESSION['user_type'] === 'reader') {
                                        header("location:/user");
                                    } else {
                                        header("location:/admin");
                                    }
                                } else {
                                    echo "Account not activated";
                                }
                            } else {
                                echo "The password you entered was not valid";
                            }
                        }
                    } else {
                        echo "No account found with that email";
                    }
                } else {
                    echo "oops! something went wrong";
                }
            }
        }
    }
    public function GLogin($name,$email)
    {
        array_pop($this->values);
        $stmt = parent::select($this->table, $this->col_name, $this->values, $email);
        if ($stmt->execute()) {
            $count = $stmt->rowcount();
            if ($count === 1) {
                $row = $stmt->fetch();
                if ($row['user_type'] === 'reader') {
                    header("location:/user");
                } else {
                    header("location:/admin");
                };
            } else {
                $this->col_name = array('name','email','provider','activated');
                $name = "'".$name."'";
                $email = "'".$email."'";
                $active = "1";
                $this->values = array($name,$email,$email,$active);
                $stmt = parent::insert($this->table,$this->col_name,$this->values);
                return $stmt->execute();
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
}
