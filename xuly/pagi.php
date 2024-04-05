<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        $conn=mysqli_connect("localhost","root","","trasua");
        
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
       
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        if(isset($_GET['keyword'])){
            $s=$_GET['keyword'];
            $sql="SELECT count(masp) FROM sanpham WHERE tensp LIKE '%$s%'
            OR gia LIKE '%$s%' 
            OR matl LIKE '%$s%'";
        }
        else 
        $sql = "select count(masp) from sanpham ";
       
        
        mysqli_query($conn,"SET NAMES,'utf8'");
        if(isset($_GET['keyword'])){
            $s=$_GET['keyword'];
            $result = mysqli_query($conn, "SELECT count(masp) FROM sanpham WHERE tensp LIKE '%$s%'
            OR gia LIKE '%$s%' 
            OR matl LIKE '%$s%'");
        }
        else 
        $result = mysqli_query($conn,"select count(masp) from sanpham ");
        $row = mysqli_fetch_array($result);

        $total_records = $row[0];
        
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 6;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        if(isset($_GET['keyword'])){
            $s=$_GET['keyword'];
            $result1 = mysqli_query($conn, "SELECT * FROM sanpham WHERE tensp LIKE '%$s%'
            OR gia LIKE '%$s%' 
            OR matl LIKE '%$s%' LIMIT $start, $limit");
        }
        else 
        $result1 = mysqli_query($conn, "SELECT * FROM sanpham  LIMIT $start, $limit");
        ?>

<div class="pagination">
    <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="menu.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> ';
                }
                else{
                    echo '<a href="menu.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="menu.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
</div>