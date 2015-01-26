<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>

<table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200">Tên SP</td>
    <td width="100">Giá</td>
    <td width="100">Hình</td>
  </tr>
  <?php
		include("dbcon.php");

//Tinh tong san pham tu database:
$sl="select * from webtm_sanpham";
$kq=mysql_query($sl);
$tsp=mysql_num_rows($kq);
$sp1t=5; // so san pham tren 1 trang
//Tinh tong so trang:
$tst=ceil($tsp/$sp1t);

//Lay trang:
if(isset($_GET['page'])) $page=$_GET['page'];
else $page=1;

//Tinh vi tri can lay san pham tuong ung voi so trang lay duoc:
$vitri=($page-1)*$sp1t;


		$s="select * from webtm_sanpham limit $vitri,$sp1t";
		$kq=mysql_query($s);
		while($d=mysql_fetch_array($kq))
		{
  ?>
  <tr>
    <td width="200"><?php echo $d["TenSP"]; ?></td>
    <td width="100"><?php echo $d["Gia"]; ?></td>
    <td width="100"><img width="50" height="50" src="<?php echo $d["UrlHinh"]; ?>"  /></td>
  </tr>
  <?php } ?>
</table>
<p>Trang: <?php for($i=1;$i<=$tst;$i++) if($i==$page) echo "<span style='font-size:20px;color:red;font-weight:bold;'>".$i."</span>&nbsp;"; else echo "<a href='phantrang.php?page=$i'>$i</a>&nbsp;";?></p>

</body>
</html>
