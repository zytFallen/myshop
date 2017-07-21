<?php
session_start();
require_once "../libs/image.func.php";
require_once "../libs/commo.func.php";
$username = $_POST["username"];
$password = md5($_POST["password"]);
$verify = $_POST["verify"];
$autoFlag = $_POST["autoFlag"];
if ($verify == $_SESSION["verify"]) {
    $link = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($link, "myshop");
    mysqli_set_charset($link, "utf-8");
    $sql = "select * from tb_admin where username='{$username}' and password='{$password}'";
    $result = mysqli_query($link, $sql);
    if (! $result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }
    $row = mysqli_fetch_array($result);
    $nums=mysqli_num_rows($result);
    if ($nums>0) {
        if ($autoFlag) {
            setcookie("adminId", $row['id'], time() + 7 * 24 * 3600);
            setcookie("adminName", $row['username'], time() + 7 * 24 * 3600);
        }
        $_SESSION['adminName'] = $row['username'];
        $_SESSION['adminId'] = $row['id'];
        echo "<script>alert('登陆成功！');window.location.href='index.php'</script>";
    } else {
        alertMessage("用户名或密码错误", "login.php");
    }
} else {
    alertMessage("验证码错误!", "login.php");
}