<?php 
    
    if (isset($_POST['up']) && isset($_FILES['img'])) {
        $target = 'C:\xampp\htdocs\2/images/' .basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"],$target );
    }
    $conn=mysqli_connect("localhost","root","","trasua");
    $id=mysqli_insert_id($conn);
    $masp=$_POST['idp'];
    $tenp=$_POST['namep'];
    $price=$_POST['price'];
    $anh=$_FILES['img']['name'];
    $dtich=$_POST['con'];
    $idlsp=$_POST['nameid'];
    $sql="INSERT INTO `sanpham`(`masp`, `tensp`, `hinhanh`, `gia`, `dungtich`, `matl`, `soluong`, `id`) VALUES ('$masp','$tenp','images/$anh','$price','$dtich','$idlsp','1','$id')";
    echo $sql;
    mysqli_query($conn,"SET NAMES,'utf8'");
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location:../index.php?act=ttsp&newsp=true");
?>