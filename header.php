<script src="ktra.js"></script>
<header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark stroke">
                <a class="navbar-brand" href="menu.php">
                    <span class="fa fa-coffee"></span> Coffee
                </a>
                <form class="col-md-4" action="xulisearch.php" method="GET" class="form-inline" onsubmit="return ktra();" >
        <input type="search" name="keyword" id=search>
        Price :
        From <input type="text" name="giabd" id="giabd">
        To <input type="text" name="giaden" id="giaden">
        <input type="submit" value=" Search " name="timkiem">
  </form>
                <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item @@contact__active">
                            <a class="nav-link" onclick="document.getElementById('id01').style.display='block';"
                                style="width:auto;">
                                <?php
                                if (isset($_SESSION['username']) && $_SESSION['username']){
                                    echo ' '.$_SESSION['username']. "<br/>";
                                    
                                    echo ' <li class="nav-item @@contact__active"><a class="nav-link" href="xuly/logout.php" ">Log out</a></li>';
                                    echo ' <li class="nav-item @@contact__active"><a class="nav-link" href="xuly/donhang.php">Order</a></li>'; 
                                }
                                else{
                                    echo '
                                    Login';                                  
                                }
                                ?>
                            </a>
                        </li>
                        <div>
                                <?php
                                if (isset($_SESSION['username']) && $_SESSION['username']){
                                    
                                   include ('ktadmin.php');
                                    
                                }
                                ?>
                        </div>
                        <li class="nav-item @@contact__active">
                        <?php 
					if(isset($_SESSION['dangky']) ||isset($_SESSION['dangnhap'])){
					echo " <a class='nav-link' href='democart/cart.php'><i class='fas fa-shopping-cart'></i><span id='cart-item' class='badge badge-danger'></span></a>";
					}else{
						echo" <a class='nav-link' href='#' onclick='kt();opendk()'><i class='fas fa-shopping-cart'></i><span id='cart-item' class='badge badge-danger'></span></a>";
					}
				?>
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container py-1">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>


    <div id="id01" class="modal">

        <form class="modal-content animate" method="POST" action="./xuly/xulydangnhap.php">
        <?php
            if(isset($_GET['dn'])) {       

                
                if($_GET['dn']=='false') {  
                    echo"<script>alert('Sai tên đăng nhập hoặc mật khẩu ');document.getElementById('id01').style.display='block'; </script>";                
                }
            }
        ?>
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <h2 style="text-align: center;color: #d17721;">Login</h2>
            </div>

            <div class="containerlf">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" name="dangnhap" class="sub">Login</button>
                
                <div type="button" style="float: right" onclick="opendk()">New member registration</div>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

    <!-- register -->
    <div id="id02" class="modal">

        <form class="modal-content animate" method="GET" action="./xuly/xulydangky.php">
        <?php
            if(isset($_GET['dk'])) {       

                
                if($_GET['dk']=='false') {  
                    if($_GET['act']=='1')
                        echo"<script>alert('Sai tên đăng nhập hoặc mật khẩu do trung '); </script>"; 
                    if($_GET['act']=='2')
                        echo"<script>alert(' Mat khau khong khop voi nhau '); </script>"; 
                    echo"<script>document.getElementById('id02').style.display='block'; </script>";   

                }
            }
        ?>
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <h2 style="text-align: center;color: #d17721;">Register</h2>
            </div>

            <div class="containerlf">
                

                <label for="uname"><b>Họ và tên </b></label>
                <input type="text" placeholder="Nhập họ và tên" name="txtten" required>

                <label for="uname"><b>Tên tài khoản</b></label>
                <input type="text" placeholder="Nhập tên tài khoản" name="uname" required>

                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="psw" required>

                <label for="psw"><b>Nhập lại mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="rpsw" required>



                <button type="submit" name="dangky" class="sub">Register</button>
                
                <div style="float: right;" type="button" onclick=opendn();>Have a acount</div>
            </div>


        </form>
    </div>