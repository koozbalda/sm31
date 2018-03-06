<?php
session_start();
//session_destroy();
//exit();
/**
 * Created by PhpStorm.
 * User: Kooz
 * Date: 01.02.2018
 * Time: 18:31
 */


/**
 * @param $name
 * check input name on our rules
 * @return bool
 */
function forName($name)
{
    $code = 'utf-8';
    $name = trim($name);
    $arr = explode(' ', $name);
    if (count($arr) > 1) {
        $_SESSION['error']['name'] = "Поле Имя введено неверно. Допустимо только одно слово";
        return false;
    }
    if (mb_strlen($name, $code) < 4 || mb_strlen($name, $code) > 16) {
        $_SESSION['error']['name'] = "Поле Имя введено неверно, длинна должна быть больше 3х символов и менее 15";
        return false;
    }
    if (!empty($_SESSION['registered']['name'])) {
        $arr = $_SESSION['registered']['name'];
        foreach ($arr as $value) {
            if ($value == $name) {
                $_SESSION['error']['name'] = "Поле Имя должно быть уникальным";
                return false;
            }
        }
    }

    return true;
}


/**
 * @param $email
 * @return bool
 */
function forEmail($email)
{
    $email = trim($email);
    $arr = explode(' ', $email);
    if (strlen($email) < 6 || (count($arr) > 1)) {
        $_SESSION['error']['email'] = "Поле Email введено неверно";
        return false;
    }

    if (!empty($_SESSION['registered']['email'])) {
        $arr = $_SESSION['registered']['email'];
        foreach ($arr as $value) {
            if ($value == $email) {
                $_SESSION['error']['email'] = "Поле email должно быть уникальным";
                return false;
            }
        }
    }


    $arr = explode('@', $email);

    if (count($arr) <= 1) {
        $_SESSION['error']['email'] = "Поле email должно содержать @";
        return false;

    }elseif(count($arr) !=2 ) {
        $_SESSION['error']['email'] = "Поле email заполнено не верно";
        return false;
    }
    return true;

}
function forText($text)
{
    $code = 'utf-8';
    $text = trim($text);
    if (mb_strlen($text, $code) < 16 || mb_strlen($text, $code) > 101) {
        $_SESSION['error']['message'] = "Поле должнo быть больше 15 символов и менее 100";
        return false;
    }
    return true;
}





//Function from send correct data or error message in session
function session_prepared($index,$bool=true){
    if (!empty($_POST[$index]) && $bool) {
        $_SESSION[$index] = $_POST[$index];
        unset($_SESSION['error'][$index]);
    } else {
        if(empty($_SESSION['error'][$index])){
            $_SESSION['error'][$index] = "Поле должно быть заполнено";
        }
        unset($_SESSION[$index]);
    }

}


//part 1 check name
session_prepared('name',forName($_POST['name']));

//part 2 check email
session_prepared('email',forEmail($_POST['email']));


//part 3 check rating
session_prepared('rating');
//part 4 check text
session_prepared('message',forText($_POST['message']));

//var_dump($_SESSION);
header('Location: /index.php');
exit();
?>

<!--<br>-->
<!--<br>-->
<!--<br>-->
<!--<br>-->
<!--<a href="index.php">back</a>>-->

















