<?php
    if(isset($_POST['logout'])){
        unset($_SESSION['fullname'],
            $_SESSION['email'],
            $_SESSION['idUser'],
            $_SESSION['phone'],
            $_SESSION['address']);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    ob_start();
    $sql_type = 'SELECT 
                    * 
                FROM 
                    `type_products` 
                ORDER BY id_type ASC';
    $row_type = mysqli_query($conn, $sql_type);
    $sql_type_couple = 'SELECT 
                            * 
                        FROM 
                            `type_products`
                        ORDER BY id_type ASC';
    $row_type_couple = mysqli_query($conn, $sql_type_couple);
    ob_flush();
?>
<!--Header Bottom-->
<section>
    <div class="font-roboto" style="background-color: #ffffff;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="index.php">
                    <img class="img-logo" src="../assets/img/oplungchat_com-Logo-02-01.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-2x"></i>
                </button>
                <div class="collapse justify-content-center navbar-collapse" id="navbarSupportedContent">
                    <div class="d-from-desktop mt-md-5 mb-md-3">
                        <form class="form-inline col-md-12 from-search" action="index.php?manage=search" method="post">
                            <input class="form-control col-10" name="search_name" placeholder="Nhập từ khóa cần tìm..." aria-label="Search">
                            <button class="btn btn-danger col-2" type="submit" name="search"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link nav-link-bot" href="index.php">TRANG CHỦ <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown dropdown-navbar">
                            <a class="nav-link nav-link-bot" href="index.php?manage=allproduct" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ỐP LƯNG IPHONE
                            </a>
                            <div class="dropdown-menu dropdown-menu-navbar wow fadeIn" data-wow-delay=".1s" data-wow-duration=".25s" aria-labelledby="dropdownMenuButton2">
                                <?php
                                    while($type = mysqli_fetch_array($row_type)){
                                        if($type['status'] == 1){
                                            if($type['type_name'] == 'Ốp lưng couple'){
                                                continue;
                                            }
                                        ?>
                                <a class="dropdown-item" href="index.php?manage=typeproduct&id=<?php echo $type['id_type'];?>">
                                    <?php echo mb_strtoupper($type['type_name'], 'UTF-8');?>
                                </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-navbar">
                            <a class="nav-link nav-link-bot" href="#" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                BỘ SƯU TẬP
                            </a>
                            <div class="dropdown-menu dropdown-menu-navbar wow fadeIn" data-wow-delay=".1s" data-wow-duration=".25s" aria-labelledby="dropdownMenuButton3">
                                <?php
                                    while($type_couple = mysqli_fetch_array($row_type_couple)){
                                        if($type_couple['status'] ==1){
                                        if($type_couple['type_name'] != 'Ốp lưng couple'){
                                            continue;
                                        }
                                        ?>
                                <a class="dropdown-item" href="index.php?manage=typeproduct&id=<?php echo $type_couple['id_type'];?>">
                                    <?php echo mb_strtoupper($type_couple['type_name'], 'UTF-8');?>
                                </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-bot" href="?manage=news">
                                TIN TỨC
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-bot" href="?manage=contact">
                                LIÊN HỆ
                            </a>
                        </li>
                        <li class="nav-item dropleft m-0 d-from-mobile">
                            <a class="nav-link outline-success" href="#" id="navbarDropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dropdown-menu dropdown-search" style="max-width: 250px;">
                                <form class="form-inline from-search" action="index.php?manage=search" method="post">
                                    <input class="form-control col-md-10" name="search_name" placeholder="Nhập từ khóa cần tìm..." aria-label="Search">
                                    <button class="btn btn-danger col-md-2" type="submit" name="search"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                        <div class="header-top-color header-top-block font-roboto">
                        <h6 class="nav-link text-center text-white m-auto font-weight-bold">Hotline: 033 940 6440</h6>
                            <ul class="nav justify-content-center">
                                <?php
                                    if(isset($_SESSION['name'])){
                                ?>
                                            <li class="nav-item">
                                                <a class="nav-link text-white pl-2 pr-2 active" href="#">
                                                    Xin chào, <?php echo $_SESSION['name'];?>
                                                </a>
                                            </li>

                                            <li class="nav-item ">
                                                <form action="" method="post" enctype="multipart/form-data"> 
                                                    <button class="btn text-white" type="submit" name="logout" data-toggle="tooltip" data-placement="bottom" title="Đăng xuất">
                                                        <i class="fas fa-sign-out-alt"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <span class="nav-link diriver-left mt-2 mb-2"></span>
                                <?php
                                    }else{
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white pl-2 pr-2 active" href="?manage=login">ĐĂNG NHẬP</a>
                                </li>
                                <span class="nav-link diriver-left mt-2 mb-2"></span>

                                <li class="nav-item">
                                    <a class="nav-link text-white pl-2 pr-2 " href="?manage=registration">ĐĂNG KÝ</a>
                                </li>
                                <span class="nav-link diriver-left mt-2 mb-2"></span>
                                        <?php
                                    }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link text-white pl-2 pr-2" href="?manage=order">
                                        GIỎ HÀNG 
                                        <?php
                                            if(isset($_SESSION['product'])){
                                                $count = count($_SESSION['product']);
                                                if($count > 0){
                                                    echo '<span class="badge badge-danger">
                                                            '.$count.'
                                                        </span>';
                                                }
                                            }
                                        ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</section>