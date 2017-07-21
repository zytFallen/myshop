<?php

class SepPage
{

    var $totalrows; //查询结果总记录数

    var $pagesize;//每页显示的记录条数

    var $arrays = array();//结果数组

    var $arrayid=array();

    var $arrayname=array();

    var $sql;//sql语句

    var $conn;//连接数据库标识

    var $page;//当前页码

    var $result;

    var $offset;//计算下一页从第几条数据开始

    var $totalpage;//总页码
    function showDate($conn, $sql, $pagesize, $page)
    {
        $this->conn = $conn;
        $this->sql = $sql;
        $this->pagesize = $pagesize;
        $this->result = mysqli_query($this->conn, $this->sql);
        $this->totalrows = mysqli_num_rows($this->result);
        $this->totalpage = ceil($this->totalrows / $this->pagesize);
        if (! isset($page) || $page == "" || ! is_numeric($page) || $page <= 0) {
            $this->page = 1;
        }  elseif ($page>$this->totalpage){
            $this->page=$this->totalpage;
        }
        else {
            $this->page = $page;
        }
        $this->offset = ($this->page - 1) * $this->pagesize;
        $query = $sql . " limit " . $this->offset . " , " . $this->pagesize;
        $res = mysqli_query($this->conn, $query);
        $rows = mysqli_fetch_array($res);
        do {
            $this->arrayid[]=$rows[id];
            $this->arrayname[]=$rows[username];
       } while ($rows = mysqli_fetch_array($res));
       array_push($this->arrays, $this->arrayid,$this->arrayname);
       return $this->arrays;
    }
    
    function showPage($contentname,$unit) {
        $showpage=3;//要显示在浏览器上的页码数量
        $pageoffset=($showpage-1)/2;//页面偏移量
       $str.="共有".$contentname."&nbsp;&nbsp;&nbsp;".$this->totalrows."&nbsp;&nbsp;".
           $unit."&nbsp;每页显示&nbsp;&nbsp;".$this->pagesize."&nbsp;&nbsp;&nbsp;".$unit."&nbsp;
                                第&nbsp;".$this->page."&nbsp;页/共&nbsp;".$this->totalpage."&nbsp;页&nbsp;&nbsp;";
       if ($this->page>1) {
        $str.= "<a href=".$_SERVER['PHP_SELF']."?page=1".">首页</a>&nbsp;";
        $str.= "<a href=".$_SERVER['PHP_SELF']."?page=".($this->page-1).">上一页</a>&nbsp;";
       }
       if ($this->totalpage>$showpage) {
           ;
       }
       if ($this->page<$this->totalpage) {
           $str.= "<a href=".$_SERVER['PHP_SELF']."?page=".($this->page+1).">下一页</a>&nbsp;";
           $str.="<a href=".$_SERVER['PHP_SELF']."?page=".($this->totalpage).">尾页</a>&nbsp;&nbsp;";         
       }
       $str.="<form action=".$_SERVER['PHP_SELF']." method='get'>";
       $str.="到第<input type='text' size='2' name='page'/>页";
       $str.="<input type='submit' value='确定' />";
       $str.="</form>";
       if ($this->arrays=null||$this->result==false) {
           return "";
       }else
       return $str;
    }
}    