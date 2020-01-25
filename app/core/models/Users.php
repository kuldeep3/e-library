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
        $this->col_name = array('name', 'email', 'password', 'user_type');
        $this->values = array('email');
        // $this->param_values = [];
    }

    public function listUsers()
    {
        return parent::list($this->table, $this->col_name);
    }


    public function insertUsers($values)
    {
        $this->col_values = $values;
        return parent::insert($this->table, $this->col_name, $this->col_values);
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
                $select = parent::select($this->table, $this->col_name, $this->values, $email);
                if ($select->execute()) {
                    if ($select->rowcount() == 1) {
                        if ($row = $select->fetch()) {
                            $name = $row['name'];
                            $email = $row['email'];
                            $hashed_password = $row['password'];
                            $user_type = $row['user_type'];
                            if (password_verify($password, $hashed_password)) {
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["name"] = $name;
                                $_SESSION["email"] = $email;
                                $_SESSION["user_type"] = $user_type;
                                echo "you have successfully logged in";
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
}
