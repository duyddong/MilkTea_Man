<?php 
    
    $conn=mysqli_connect("localhost","root","","trasua");
    
    $tendn = $_SESSION['username'];
    $sql = "SELECT * from khachhang where Username='$tendn' AND Quyen ='1'";
    
    mysqli_query($conn,"SET NAMES,'utf8'");
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0) {
        echo '<a class="nav-link" href="./Admin/index.php">Admin</a>';
    }
   
    
    
   
        
    //!mysqli_query($connection,$sql);


?>