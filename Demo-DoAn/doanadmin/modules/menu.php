<?php
    if(isset($_POST['logout'])){
        unset($_SESSION['login']);
        header('location:login.php');
    }
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #0C1C35; background-repeat: repeat-y;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav flex-column justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="index.php?manage=typeproduct&ac=list">
                    Quản lý loại sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?manage=product&ac=list">
                    Quản lý sản phẩm
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="index.php?manage=user&ac=list">
                    Quản lý thành viên
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="index.php?manage=bill&ac=list">
                    Quản lý hóa đơn
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?manage=rate&ac=list">
                    Quản lý bình luận
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="index.php?manage=news&ac=list">
                    Quản lý bài viết
                </a>
            </li>
        </ul>
    </div>
</nav>
