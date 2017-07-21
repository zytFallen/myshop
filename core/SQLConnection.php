<?php

//数据库连接类
class SQLConnect
{
    var $db_type;
    var $host;

    var $username;

    var $password;

    var $DBname;

    var $conn;
    var $rowsArray=array();
    
    // 构造函数，为成员变量赋值
    function __construct($db_type,$host, $username, $password, $DBname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->DBname = $DBname;
        $this->db_type=$db_type;
    }

    // 连接数据库
    function connect()
    {
        $this->conn=@mysqli_connect($this->host,$this->username,$this->password,$this->DBname);
        mysqli_set_charset($this->conn, "utf-8");
        return $this->conn;
    } 
   
    //查询结果条数
     function getNumRows($sql) {
         $result=mysqli_query($this->conn, $sql);
         return mysqli_num_rows($result);
     }
     
     //查询一条数据
     function getOne($sql) {
         $result=mysqli_query($this->conn, $sql);
         return mysqli_fetch_array($result,MYSQLI_ASSOC);
     }
     
     //查询多条数据
     function getAll($sql) {
         $result=mysqli_query($this->conn, $sql);
         while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $this->rowsArray[]= $row;
         }
         return $this->rowsArray;
     }
     //更新丶删除丶增加的函数，返回受影响的条数
     function getAffectRows($sql) {
         $result=mysqli_query($this->conn, $sql);
         return mysqli_affected_rows($this->conn);
     }
    // 关闭数据库
    function close()
    {
        return @mysqli_close($this->conn);
    }
    
}