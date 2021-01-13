<!--Header Top-->
<section>
    <div class="header-top-color font-roboto">
        <ul class="nav justify-content-end container">
            <li class="nav-item mr-auto">
                <h6 class="nav-link text-white m-auto font-weight-bold">Hotline: 033 940 6440</h6>
            </li>
<?php
    if(isset($_SESSION['fullname'])){
?>
            <li class="nav-item">
                <a class="nav-link active" href="?manage=user">
                    Xin chào, <?php echo $_SESSION['fullname'];?>
                </a>
            </li>

            <li class="nav-item">
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
                <a class="nav-link  active" href="?manage=login">ĐĂNG NHẬP</a>
            </li>
            <span class="nav-link diriver-left mt-2 mb-2"></span>

            <li class="nav-item">
                <a class="nav-link " href="?manage=registration">ĐĂNG KÝ</a>
            </li>
            <span class="nav-link diriver-left mt-2 mb-2"></span>
        <?php
    }
?>
            <li class="nav-item">
                <a class="nav-link" href="?manage=order">
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
</section>