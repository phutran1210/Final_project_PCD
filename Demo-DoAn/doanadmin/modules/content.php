<div class="contaner-fluid">
    <div class="row mr-0 ml-0">
    <div class="menu-admin col-md-3 pl-0 pr-0">
    <?php require('../modules/menu.php');?>
</div>
<div class="col-md-9">
    <?php
        if(isset($_GET['manage']) && $_GET['ac']){
            $tam = $_GET['manage'];
            $tam1 = $_GET['ac'];
        }else{
            $tam = '';
        }
        if($tam == 'product' && $tam1 == 'add'){
            //Thêm sản phẩm
            require('../modules/manageproduct/add.php');
        }elseif($tam == 'product' && $tam1 == 'list'){
            //DS sản phẩm
            require('../modules/manageproduct/list.php');
        }elseif($tam == 'product' && $tam1 == 'update'){
            //Sửa sản phẩm
            require('../modules/manageproduct/update.php');
        }elseif($tam == 'gallery' && $tam1 == 'list'){
            //DS ảnh
            require('../modules/managegallery/list.php');
        }elseif($tam == 'gallery' && $tam1 == 'add'){
            //Thêm ảnh
            require('../modules/managegallery/add.php');
        }elseif($tam == 'typeproduct' && $tam1 == 'add'){
            //Thêm loại
            require('../modules/managetypeproduct/add.php');
        }elseif($tam == 'typeproduct' && $tam1 == 'list'){
            //DS loại
            require('../modules/managetypeproduct/list.php');
        }elseif($tam == 'typeproduct' && $tam1 == 'update'){
            //Sửa loại
            require('../modules/managetypeproduct/update.php');
        }elseif($tam == 'user' && $tam1 == 'list'){
            //DS thành viên
            require('../modules/manageuser/list.php');
        }elseif($tam == 'bill' && $tam1 == 'list'){
            //DS đơn hàng
            require('../modules/managecart/list.php');
        }elseif($tam == 'bill' && $tam1 == 'update'){
            //Sửa đơn hàng
            require('../modules/managecart/update.php');
        }elseif($tam == 'bill' && $tam1 == 'view'){
            //Xem đơn hàng
            require('../modules/managecart/view.php');
        }elseif($tam == 'rate' && $tam1 == 'list'){
            //DS đánh giá
            require('../modules/managerate/list.php');
        }elseif($tam == 'rate' && $tam1 == 'view'){
            //Xem đánh giá
            require('../modules/managerate/view.php');
        }elseif($tam == 'news' && $tam1 == 'list'){
            //DS tin tức
            require('../modules/managenews/list.php');
        }elseif($tam == 'news' && $tam1 == 'add'){
            //Thêm tin tức
            require('../modules/managenews/add.php');
        }elseif($tam == 'news' && $tam1 == 'update'){
            //Sửa tin tức
            require('../modules/managenews/update.php');
        }elseif($tam == 'search' && $tam1 == 'sp'){
            //Tìm sản phẩm
            require('../modules/search/searchProduct.php');
        }elseif($tam == 'search' && $tam1 == 'us'){
            //Tìm thành viên
            require('../modules/search/searchUser.php');
        }elseif($tam == 'search' && $tam1 == 'cart'){
            //Tìm đơn hàng
            require('../modules/search/searchCart.php');
        }else{
            require('../modules/view.php');
        }
    ?>
</div>
    </div>

</div>


