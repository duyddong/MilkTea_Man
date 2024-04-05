<?php 
    if (isset($_POST['up']) && isset($_FILES['img'])) {
        $target = 'C:\xampp\htdocs\2/images/' .basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"],$target );
    }
    $conn=mysqli_connect("localhost","root","","trasua");
    $masp=$_POST['idp'];
    $tenpr=$_POST['namep'];
    $gia =$_POST['price'];
    $anh=$_FILES['img']['name'];
    $dt=$_POST['con'];
    $matl=$_POST['nameid'];
    $sql="UPDATE `sanpham` SET `masp`='$masp',`tensp`='$tenpr',`hinhanh`='images/$anh',`gia`='$gia',`dungtich`='$dt',`matl`='$matl' WHERE `masp`='$masp'";
    echo $sql;
    mysqli_query($conn,"SET NAMES,'utf8'");
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location:../index.php?act=ttsp&editsp=true");
?>