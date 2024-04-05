<link rel="stylesheet" href="indexcss.css">
<?php
$conn=mysqli_connect("localhost","root","","trasua");
$sql="select * from sanpham";
$result=mysqli_query($conn,$sql);
echo "<div class='table_dep'><div class='table1'>
<div style='height: 45px;text-align:center;line-height:45px;border: #000 1px solid;'>DANH SÁCH SẢN PHẨM</div>
<div class='table_dep3'style='height:50px;width:15%'>IDSản Phẩm</div>
<div class='table_dep3'style='height:50px;width:15%'>Tên Sản Phẩm </div>
<div class='table_dep3'style='height:50px;width:20%'>Hình Ảnh</div>
<div class='table_dep3'style='height:50px;width:9%'>Đơn Giá  <a href='index.php?act=ttsp&sapxep=gia'><i class='fas fa-arrow-circle-up'></i></a></div>
<div class='table_dep3'style='height:50px;width:9%'>Dung Tích  <a href='index.php?act=ttsp&sapxep=dtich'><i class='fas fa-arrow-circle-up'></i></a></div>
<div class='table_dep3'style='height:50px;width:15%'>Mã Thể Loại</div>
<div class='table_dep3'style='height:50px;width:9%'><button> <a href='index.php?act=ttsp&nut=them'>Thêm</a></button></div>
<div class='table_dep3'style='height:50px;width:7%'><button><a href='index.php?act=ttsp&nut=tim'> Tìm kiếm</a></button></div></div>";
include('phantrang.php');
include('pagi.php');
echo "</div>";
mysqli_query($conn,"SET NAMES,'utf8'");
mysqli_query($conn,$sql);
mysqli_close($conn);
?>
<div style="height:auto;width:100%;">
    <?php
        if(isset($_GET['nut']))
        {
            if($_GET['nut']=="them")
                include('product/newpro.php');
            else {
                include('product/timpro.php');
            }    
        }
        if(isset($_GET['sapxep'])){
            include('product/sapxep.php');
        }
        if(isset($_GET['sua']))
            include('product/suapro.php');
        if(isset($_GET['xoa']))
        {
            include('product/xoapro.php');
        }
        if(isset($_GET['newsp']))
        {
            if($_GET['newsp']=="true")
                echo"<script>alert('Thêm sản phẩm thành công');</script>";
        }
        if(isset($_GET['editsp']))
        {
            if($_GET['editsp']=="true")
                echo"<script>alert('cập nhật sản phẩm thành công');</script>";
        }
        if(isset($_GET['delsp']))
        {
            if($_GET['delsp']=="true")
                echo"<script>alert('xoa sản phẩm thành công');</script>";
        }
        if(isset($_GET['timsp']))
        {
            if($_GET['timsp']=="false")
                echo"<script>alert('Thông Tin Bạn Cần Tìm Không Tồn Tại');</script>";
            else {
                $lenh=$_GET['timsp'];
                include('product/showtimp.php');
            }
        }
    ?>
</div>