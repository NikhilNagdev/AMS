<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 10/11/2019
 * Time: 12:15 AM
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/database/core/CRUD.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/database/models/User.class.php");
class Process
{
    function __construct()
    {
        $this->process = CRUD::table("user");
        $this->user = new User();
    }

    public function processLogin()
    {
        echo "inside process login";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rs = $this->user->getUser($email);
        $entry = $rs->rowCount();
        if ($entry == 1) {
            echo "1 user found";
            echo "<br>";
            $row = $rs->fetch(PDO::FETCH_ASSOC);
            $user_id = $row['user_id'];
            $dbpassword = $row['password'];
            $name = $row['name'];
            $role = $row['role'];
            if ($password == $dbpassword) {
                echo "1 user found";
                echo "<br>";
                if (!isset($_SESSION['user_id'])) {
                    session_start();
                }
                $_SESSION['user_id'] = $user_id;
                $_SESSION['name'] = $name;
                if ($role == 1) {
                    $_SESSION['role'] = "Administrator";
                    header("Location: public/admin/index.php");
                } elseif ($role == 2) {
                    $_SESSION['role'] = "Teacher";
                    header("Location: public/teacher/index.php");
                }
            } else {
                echo "wrong password";
            }
        } else {
            //WRONG EMAILADDRESS
        }
    }
    public function processLogout()
    {
        if (isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = null;
            $_SESSION['role'] = null;
            $_SESSION['name'] = null;
        }
        session_unset();
    }
    public function processForgetPassword()
    {
        $email = $_POST['email'];
        $rs = $this->process
            ->where("email", $email)
            ->select("user_id")
            ->get();
        $entry = $rs->rowCount();
        if ($entry == 1) {
            $length = 50;
            $token = bin2hex(openssl_random_pseudo_bytes($length));
            $rs = $this->process
                ->where("email", $email)
                ->update(array("token" => $token));
            $to = $email;
            $subject = "Reset Password";
            $message = "To reset your password please click the above link<br>";
            $message .= "<a href = 'http://localhost//includes/reset.php?token={$token}'>http://localhost/PRS/reset.php?token={$token}</a>\";";
            $header = "From:noreply@tf.com\r\n";
            $header .= "MIME-version: 1.0\r\n";
            $header .= "Content-Type: text/html\r\n";
            if (mail($to, $subject, $message, $header)) {
                echo "sent";
            } else {
                echo "Error";
            }
        } else {
            echo "NO USER FOUNDDD";
        }
    }

    public function processReset()
    {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $token = $_POST['token'];
        if ($password == $confirm_password) {
            if ($password === $confirm_password) {
                $result = $this->process
                    ->where("token", $token)
                    ->select("user_id")
                    ->get();
                $entry = $result->rowCount();
                if ($entry === 1) {
                    $row = $result->fetch();
                    $user_id = $row->user_id;
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $this->process
                        ->where("user_id", $user_id)
                        ->update(array("password" => $hashed_password));
                    header("Location: ../login.php");
                }
            }
        }
    }

    private $user;
}
