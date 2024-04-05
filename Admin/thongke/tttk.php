<?php 
$conn=mysqli_connect("localhost","root","","trasua");
if(empty($_POST['masp'])){
    $bd = $_POST['bd'];
    $kt = $_POST['kt'];
 $sql="select * from hoadon where ngaylap between '".$bd."' and '".$kt."'";
}
mysqli_query($conn,"SET NAMES,'utf8'");
mysqli_query($conn,$sql);
mysqli_close($conn);
header("location:../index.php?act=tttk&tk=$sql");
?>