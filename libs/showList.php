<?php
$link = mysqli_connect("localhost", "root", "root");
mysqli_select_db("myshop");
mysqli_set_charset($link, "utf8");
$sql="select * from tb_admin where username=Admin";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_row($result);
if (!$row) {
  echo "<script>alert('不存在');</script>";
}else{
  echo "<script>alert(不存在');</script>";
}