<?php 
    $conn=mysqli_connect("localhost","root","","trasua");
    if($_GET['sapxep']=="gia")
        $sql= "SELECT * FROM `sanpham` WHERE 1 ORDER BY `sanpham`.`gia` ASC";
    else 
        $sql="SELECT * FROM `sanpham` WHERE 1 ORDER BY `sanpham`.`dungtich` ASC";
    $result=mysqli_query($conn,$sql);
echo "<div class='table_dep'><div class='table1'>
<div style='height: 45px;text-align:center;line-height:45px;border: #000 1px solid;'>DANH SÁCH SẢN PHẨM</div>
<div class='table_dep3'style='height:50px;width:15%'>IDSản Phẩm</div>
<div class='table_dep3'style='height:50px;width:15%'>Tên Sản Phẩm </div>
<div class='table_dep3'style='height:50px;width:20%'>Hình Ảnh</div>
<div class='table_dep3'style='height:50px;width:9%'>Đơn Giá</div>
<div class='table_dep3'style='height:50px;width:9%'>Dung Tích</div>
<div class='table_dep3'style='height:50px;width:15%'>Mã Thể Loại</div>
<div class='table_dep3'style='height:50px;width:9%'><button> <a href='index.php?act=ttsp&nut=them'>Thêm</a></button></div>
<div class='table_dep3'style='height:50px;width:7%'><button><a href='index.php?act=ttsp&nut=tim'> Tìm kiếm</a></button></div></div>";
echo "</div>";
while ($row = mysqli_fetch_array($result)) {
    echo "<div class='table_dep4'style='height:100px;width:15%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[0]."</div>";
    echo "<div class='table_dep4'style='height:100px;width:15%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[1]."</div>";
    echo "<div class='table_dep4'style='height:100px;width:20%;border-bottom-style: solid;border-bottom-color: coral;'><img src='../".$row[2]."'style='width:98%; height:98%;' /></div>";
    echo "<div class='table_dep4'style='height:100px;width:9%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[3]."</div>";
    echo "<div class='table_dep4'style='height:100px;width:9%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[4]."</div>";
    echo "<div class='table_dep4'style='height:100px;width:15%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[5]."</div>";
    echo "<div class='table_dep4'style='height:100px;width:9%;border-bottom-style: solid;border-bottom-color: coral;'><a href='index.php?act=ttsp&sua=".$row[0]."'> Sửa</a></div>";
    echo "<div class='table_dep4'style='height:100px;width:7%;border-bottom-style: solid;border-bottom-color: coral;'><a href='index.php?act=ttsp&xoa=".$row[0]."'onclick='return confirmDelete(this);'> Xóa</a></div>";
    echo "";
}
mysqli_query($conn,"SET NAMES,'utf8'");
mysqli_close($conn);
?>