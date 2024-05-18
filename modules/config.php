<?php
function handleError($errno, $errstr, $errfile, $errline, array $errcontext)
{
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler('handleError');


class Tools
{
    static function connect($host = "127.0.0.1", $user = 'root', $pass = '', $dbname = 'print')
    {
        $cs = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $options =
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ];
        try {
            $pdo = new PDO($cs, $user, $pass, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    static function checkUser($login, $password)
    {
        try {

            //$cryptedPassword = md5($password);
            //$cryptedPassword = sha1($cryptedPassword);
            $cryptedPassword = $password;
            $pdo = Tools::connect();
            $ps = $pdo->prepare('SELECT COUNT(*) FROM `roles` WHERE `login` = :login AND `pass` = :cryptedPassword;');
            $ps->bindParam(':login', $login);
            $ps->bindParam(':cryptedPassword', $cryptedPassword);
            $ps->execute();
            $row_count = $ps->fetchColumn();
            if ($row_count == 1) {
                $result = true;
                echo "<h5 class='text-success'>Вход выполнен</h5>";
                $_SESSION['register'] = $login;

                return true;
            } else {
                $result = false;
                echo "<h5 class='text-danger'>Вход невыполнен</h5>";
                return false;
            }
        } catch (PDOException $e) {
            die("Secured");
        }
        $ps = null;
        $pdo = null;
        return $result;
    }
}
