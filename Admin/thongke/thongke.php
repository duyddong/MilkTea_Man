<link rel="stylesheet" href="indexcss.css">
<div id="signinContainer2">
    <form action="thongke/tttk.php" method="post">
	<div style="width:95%; height:240px; margin-left:2.5%">
		<p>Mã Sản Phẩm</p>
		<input type="text" name="masp">
		<p>Từ Ngày </p>
		<input type="text" name="bd" placeholder="dd--mm--yyyy">
		<p>Đến Ngày</p>
		<input type="text" name="kt" placeholder="dd--mm--yyyy">
		<input type="submit" value="Tìm Kiếm">
</div>
	</form>
</div>
<div style="height:auto;width:100%;">
<?php if(isset($_GET['tk'])){
	$lenh = $_GET['tk'];
	include('thongke/showtk.php');
}
?>
</div>
