<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 14:10
 */
$PATH = "../";
include("{$PATH}model/db_user.inc.php");
session_start();
$user = $_SESSION["user"];
if (is_a($user, "Member")) {
    $type = $user->getType();
    if($type == "ADMIN"){
        header("Location:{$PATH}view/manage_user.php");
        exit();
    }
    else{
        header("Location:{$PATH}view/user.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table border="1">
<tr>
    <th>username</th>
    <th>password</th>
    <th>name</th>
    <th>surname</th>
    <th>edit</th>
</tr>

<?php
$users = get_users();
for($i=0;$i<count($users);$i++){
    echo "<tr><td>".$users[$i]['username']."</td><td>".$users[$i]['password']."</td><td>".$users[$i]['name']."</td><td>".$users[$i]['surname']. "</td>
        <td>
        <form action='../view/edit_user.php' method='post'>
            <input type='submit' value='edit'/>
            <input type='hidden' name='edit' value='" .$users[$i]['username']. "' />
        </form>
        <form action='../controller/manage.php' method='post'>
            <input type='submit' value='delete'/>
            <input type='hidden' name='delete' value='" .$users[$i]['username']."'/>
        </form>
        </td></tr>";
}
?>
</table>
<form action="../controller/manage.php" method="post">
    <table border="1">
        <tr>
            <td>username</td>
            <td><input type='text' name='username'/></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type='text' name='password' /></td>
        </tr>
        <tr>
            <td>name</td>
            <td><input type='text' name='name'/></td>
        </tr>
        <tr>
            <td>surname</td>
            <td><input type='text' name='surname' /></td>
        </tr>
        <input type="submit" value="save" name="save"/>
    </table>
</form>
<form action="../controller/check_login.php" method="post">
    <input type="submit" value="logout" name="logout"/>
</form>
</body>
</html>

