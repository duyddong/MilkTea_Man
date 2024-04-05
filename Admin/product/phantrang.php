<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        $conn=mysqli_connect("localhost","root","","trasua");
        
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        
        $sql = "select count(masp) from sanpham ";
       
        
        mysqli_query($conn,"SET NAMES,'utf8'");
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
        $result = mysqli_query($conn, "SELECT * FROM sanpham  LIMIT $start, $limit");
 
        ?>
<div>
    <?php 
            // PHẦN HIỂN THỊ TIN TỨC
            // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='table_dep4'style='height:100px;width:15%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[0]."</div>";
                echo "<div class='table_dep4'style='height:100px;width:15%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[1]."</div>";
                echo "<div class='table_dep4'style='height:100px;width:20%;border-bottom-style: solid;border-bottom-color: coral;'><img src='../".$row[2]."'style='width:98%; height:98%;' /></div>";
                echo "<div class='table_dep4'style='height:100px;width:11%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[3]."</div>";
                echo "<div class='table_dep4'style='height:100px;width:7%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[4]."</div>";
                echo "<div class='table_dep4'style='height:100px;width:15%;border-bottom-style: solid;border-bottom-color: coral;'>".$row[5]."</div>";
                echo "<div class='table_dep4'style='height:100px;width:9%;border-bottom-style: solid;border-bottom-color: coral;'><a href='index.php?act=ttsp&sua=".$row[0]."'> Sửa</a></div>";
                echo "<div class='table_dep4'style='height:100px;width:7%;border-bottom-style: solid;border-bottom-color: coral;'><a href='index.php?act=ttsp&xoa=".$row[0]."'onclick='return confirmDelete(this);'> Xóa</a></div>";
                echo "";
             }
            ?>
</div>

