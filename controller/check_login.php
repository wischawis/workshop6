<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 14:04
 */
$PATH = "../";
include("{$PATH}class/Authentication.class.php");
session_start();
?>
<?php
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $mem = Authentication::login($user, $pass);
        if (is_a($mem, "Member")) {
            if($mem->getType() == "ADMIN"){
                $_SESSION["user"] = $mem;
                header("Location:{$PATH}view/manage_user.php");
                exit();
            }
            else{
                $_SESSION["user"] = $mem;
                header("Location:{$PATH}view/user.php");
                exit();
            }
        }
        else{
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านผิด')</script>";
            echo "<script>window.location='{$PATH}index.php'</script>";
        }
    }
    if(isset($_POST["logout"])){
        Authentication::logout($_SESSION["user"]);
        session_unset();
        session_destroy();
        if (ini_get("session.use_cookies")) {
            setcookie(session_name(),'',time() -3600,"/");
        }
        header("Location: {$PATH}index.php");
        exit();
    }
?>
