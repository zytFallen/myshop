<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
   <div id="a2" style="height:110px; ">
	<table>
	<tr>
	<td><a href="addAdmin"><input type="button"  name="submit" value="添加管理员"/></a></td>
	</tr>
	</table>
	</div>	 
	 <h2 style="text-align: center">管理员</h2>
	<table id="ad1" style="width:50%;height:250px;margin: 0px auto;text-align: center; ">
	 <tr id="ad2" style="background-color: #9d9d9d;">
	 <td style="width:15%; color:#28ff28;border:1px solid blue;">管理员编号</td>
	 <td style="width:25%;color:#28ff28;border:1px solid blue; margin-left:0px;">管理员账号</td>
	 <td style="width:10%; color:#28ff28;border:1px solid blue; margin-left:0px;">操作 </td>
     </tr>
<?php 
require_once '../core/system.inc.php';
$rows=$seppage->showDate($conn, "select * from tb_admin order by id", 3, $_GET['page']);
for ($i=0;$i<count($rows[0]);$i++){
    ?>
   <tr>
       <td style="border:1px solid blue; "><?php echo $rows[0][$i];?></td>
       <td style="border:1px solid blue; margin-left:0px;"><?php echo $rows[1][$i];?></td>
       <td style="border:1px solid blue; margin-left:0px;"><a href="delAdmin.php">删除</a></td>
       </tr> 
    <?php 
}?>
</table>  
<table style="margin: 0px auto;width:50%;padding: 0px;border-collapse: collapse">
<tr>
<td style="width: 37%"><?php echo $seppage->showPage("管理员", "个");?></td>
</tr>
</table>
</body>
</html>