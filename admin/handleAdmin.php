<?php
    $link = mysqli_connect("localhost", "root", "root", "myshop");
    if (mysqli_connect_error()) {
        die('数据库连接失败(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    }
    mysqli_set_charset($link, "utf8");
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
        $query="select * from tb_admin where username='$username'";
    $result=mysqli_query($link, $query);
    $row=mysqli_fetch_object($result);
    if (!empty($row)) {
        echo "<script>alert('该管理员已存在！请重新添加');location.href='addAdmin.php';</script>";    
    }else {
        $sql=mysqli_query($link, "insert into tb_admin(username)values('$username')");
        echo "<script>alert('添加成功！');window.location.href='addSucess.php';</script>"; 
    }  mysqli_free_result($result);
        mysqli_close($link);