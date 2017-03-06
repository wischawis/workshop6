<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 16:02
 */
$PATH = "../";
include("{$PATH}model/db_user.inc.php");
?>
<?php
if(isset($_POST['save'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        if(empty(get_user($user))){
            $result = add_user($user, $pass, $name, $surname);
            if ($result){
                header("Location:{$PATH}view/manage_user.php");
                exit();
            }
            else{
                header("Location:{$PATH}view/manage_user.php");
                exit();
            }
        }
        echo "<script>alert('Username ซ้ำ')</script>";
        echo "<script>window.location='{$PATH}view/manage_user.php'</script>";
    }
}
if(isset($_POST['delete'])){
    $user = $_POST['delete'];
    $result = delete_user($user);
    if ($result)
        header("Location:{$PATH}view/manage_user.php");

}
if(isset($_POST['save_edit'])){
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['save_edit'])&& isset($_POST['id'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $id = $_POST['id'];
        $s_user = $_POST['save_edit'];
        $user_a = get_user($user);
        if(empty($user_a)||$id == $user_a[0]['id']) {
            $result = update_user($user, $pass, $name, $surname, $s_user);
            if ($result){
                header("Location:{$PATH}view/manage_user.php");
                exit();
            }
            else{
                header("Location:{$PATH}view/edit_user.php");
                exit();
            }
        }
        echo "<script>alert('Username ซ้ำ')</script>";
        echo "<script>window.location='{$PATH}view/manage_user.php'</script>";
    }
}
?>