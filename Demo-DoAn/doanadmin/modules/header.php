<!--Header-->
<section>
    <div class="container-fluid font-roboto d-flex" style="background: #0C1C35;">
        <a class="text-white pr-3 m-0" href="../views/index.php">
            <h1>
                Xin chào, <?php echo $_SESSION['login']; ?>
            </h1>
        </a>
        <div class="d-flex ml-auto">
            <?php
                if(isset($_GET['manage'])){
                    $tam = $_GET['manage'];
                }else{
                    $tam = '';
                }
                if($tam == 'product'){
            ?>
            <form class="ml-auto form-inline my-2 my-lg-0" action="index.php?manage=search&ac=sp" method="post">
                <input class="form-control mr-sm-2 col-md-9 col-9" name="product" type="text" placeholder="Nhập thông tin cần tìm" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0 col-md-2 col-2" type="submit" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <?php
                }elseif($tam == 'user') {
            ?>
            <form class="ml-auto form-inline my-2 my-lg-0" action="index.php?manage=search&ac=us" method="post">
                <input class="form-control mr-sm-2 col-md-9 col-9" name="user" type="text" placeholder="Nhập thông tin cần tìm" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0 col-md-2 col-2" type="submit" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <?php
                }elseif($tam == 'bill') {
            ?>
            <form class="ml-auto form-inline my-2 my-lg-0" action="index.php?manage=search&ac=cart" method="post">
                <input class="form-control mr-sm-2 col-md-9 col-9" name="cart" type="text" placeholder="Nhập thông tin cần tìm" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0 col-md-2 col-2" type="submit" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <?php
                }else{
            ?>
            <form class="ml-auto form-inline my-2 my-lg-0" action="index.php?manage=search&ac=sp" method="post">
                <input class="form-control mr-sm-2 col-md-9 col-9" name="product" type="text" placeholder="Nhập thông tin cần tìm" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0 col-md-2 col-2" type="submit" name="search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <?php
                }
            ?>
            
            <form class="d-flex ml-auto" action="" method="post" enctype="multipart/form-data">
                <button class="btn text-danger" type="submit" name="logout" data-toggle="tooltip" data-placement="bottom" title="Đăng xuất">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</section>