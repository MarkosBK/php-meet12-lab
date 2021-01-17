<?php
function connect($host = "localhost", $user = "root", $pass = "root", $dbname = "usersDb")
{
    $link = mysqli_connect($host, $user, $pass) or die("Failed connect to server");
    mysqli_select_db($link, $dbname) or die("Failed connet to database");
    mysqli_query($link, "set names 'utf-8'");
    return $link;
}
$link = connect();



class User
{
    public $login;
    public $password;
    public $email;

    function __construct($login, $password, $email)
    {
        $this->login = trim(htmlspecialchars($login));
        $this->password = trim(htmlspecialchars($password));
        $this->email = trim(htmlspecialchars($email));
    }
    function show()
    {
        echo "<h3>Login:" . $this->login . "</h3>";
        echo "<h3>Email:" . $this->email . "</h3>";
    }

    function register()
    {
        global $link;

        if ($this->login == "" || $this->password == "" || $this->email == "") {
            echo "<h3 align='center' style='color: red'>Query: Не все поля заполнены!</h3>";
            return false;
        }
        if (strlen($this->login) < 3 || strlen($this->login) > 30) {
            echo "<h3 align='center' style='color: red'>Query: Логин должен быть от 3 до 30 символов!</h3>";
            return false;
        }
        $ins1 = "INSERT INTO users (login, pass, email) VALUES ('" . $this->login . "', '" . md5($this->password) . "', '" . $this->email
            . "')";
        mysqli_query($link, $ins1);
        $error = mysqli_errno($link);
        if ($error) {
            if ($error == 1062) {
                echo "<h3 align='center' style='color: red'>Пользователь с таким логином существует</h3>";
                return false;
            } else {
                echo "<h3 align='center' style='color: red'>Произошла ошибка: " . $error . "</h3>";
                return false;
            }
        }
        return true;
    }
}