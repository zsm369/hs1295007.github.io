<!DOCTYPE html>
<?php
session_start();

$con = mysqli_connect('localhost','root','hansung','guest');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($_POST['username'])) {
        echo "<script> alert('Please enter your name!')</script>";
        }
    if (empty($_POST['password'])) {
        echo "<script> alert('Please enter your password!')</script>";
        }
    
    $query = "SELECT name, pass FROM guest WHERE name='$username' AND pass='$password' ";
    $result = mysqli_query($con,$query);
    
    if ( mysqli_num_rows($result) > 0 ) {
            $_SESSION['login']=$username;
            header("Location: content.php");
    } else {
        echo "Wrong username or password !";
    }

}
?>
<html>
<head>
    <title> Login Page </title>
</head>
<body>
<center>
    <form method="post" action="login.php">
    <table border="2" >
        <tr>
            <td colspan="2" align="center"> Login </td>
        </tr>
        <tr>
            <td width="100" align="center"> Username </td>
            <td> <input type="text" name="username" > </td>
        </tr>
        <tr>
            <td width="100" align="center"> Password </td>
            <td> <input type="password" name="password" > </td>
        </tr>
        <tr>
            <td colspan="2" align="center"> 
            <input type="submit" name="submit" value="Login" > </td>
        </tr>
        </table>
    </form>
    <b> Not registered yet? <a href="registration.php"> Registeration </a></b>
</center>
</body>
</html>