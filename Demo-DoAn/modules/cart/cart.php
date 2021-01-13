<?php
    @session_start();
    if(isset($_SESSION['product'])){
        if(isset($_SESSION['email'])){
?>
<!--Cart-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <form action="../modules/cart/payment.php" method="post">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h3>Thông tin khách hàng</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ipFullname">Họ và tên</label>
                                <input name="fullname" type="text" class="form-control" id="ipFullname" value="<?php echo $_SESSION['name'];?>" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ipPhone">Số điện thoại</label>
                                <input name="phone" type="text" class="form-control" id="ipPhone" value="<?php echo $_SESSION['phone'];?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ipEmail">Email</label>
                            <input name="email" type="email" class="form-control" id="ipEmail" value="<?php echo $_SESSION['email'];?>" >
                        </div>
                        <div class="form-group">
                            <label for="ipAddress">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="ipAddress" value="<?php echo $_SESSION['address'];?>" >
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ghi chú</label>
                            <textarea name="ghichu" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="d-flex">
                            <button type="submit" name="update" class="btn btn-orange ml-auto mt-3 mb-3">
                                Cập nhật
                            </button>
                        </div>
                    </div>
<?php
        }else{
?>
<!--Cart-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <form action="../modules/cart/payment.php" method="post">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h3>Thông tin khách hàng</h3>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ipFullname">Họ và tên</label>
                                <input name="fullname" type="text" class="form-control" id="ipFullname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ipPhone">Số điện thoại</label>
                                <input name="phone" type="text" class="form-control" id="ipPhone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ipEmail">Email</label>
                            <input name="email" type="email" class="form-control" id="ipEmail">
                        </div>
                        <div class="form-group">
                            <label for="ipAddress">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="ipAddress">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ghi chú</label>
                            <textarea name="ghichu" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="d-flex">
                            <button type="submit" name="update" class="btn btn-orange ml-auto mt-3 mb-3">
                                Cập nhật
                            </button>
                        </div>
                    </div>
<?php
        }
?>
                    <div class="col-md-8">
                        <div class="d-flex mb-3">
                            <h3 class="mr-auto">Chi tiết đơn hàng</h3>
                            <a class="ml-auto text-danger" href="../modules/cart/update_cart.php?deleteAll=1">Xóa toàn bộ giỏ hàng</a>
                        </div>
                        <table class="table table-bordered vertical-middle table-sm overflow-auto">
                            <thead>
                                <tr class="text-center">
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá sản phẩm và Số lượng</th>
                                <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        $total = 0;
        $ship = 0;
        if(isset($_SESSION['address'])){
            $address = mb_strtolower($_SESSION['address']);
            if(strpos($address, 'hồ chí minh')){
                $ship = 30000;
            }else{
                $ship = 50000;
            }
        }
        foreach($_SESSION['product'] as $cart_item){
            $id = $cart_item['id'];
            $sql_products = "SELECT * FROM `product` WHERE `id_product` = '$id'";
            $query_products = mysqli_query($conn, $sql_products);
            $row_product = mysqli_fetch_array($query_products);
?>
                                <tr>
                                    <td>
                                        <img class="ml-auto mr-auto" style="width: 50px;" src="../doanadmin/modules/manageproduct/uploads/<?php echo $row_product['img_1'];?>" alt="">
                                        <?php echo $row_product['product_name'];?>
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php echo number_format($row_product['price']);?>đ
                                            </div>
                                            <div class="col-md-6">
                                                <a class="text-danger" href="../modules/cart/update_cart.php?reduced=<?php echo $cart_item['id'];?>">
                                                    <i class="fas fa-minus"></i>
                                                </a>
                                                <span>
                                                <?php echo $cart_item['soluong'];?>
                                                </span>
                                                <a class="text-danger" href="../modules/cart/update_cart.php?plus=<?php echo $cart_item['id'];?>">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                
                                                <a class="text-danger" href="../modules/cart/update_cart.php?delete=<?php echo $cart_item['id'];?>">
                                                    xóa
                                                </a>
        
                                            </div>
                                        </div>
                                    </td>
<?php
            $totalProduct = 0;
            $totalProduct = ($cart_item['soluong'] * $cart_item['price']);
            $total = ($total + $totalProduct);
?>
                                    <td class="text-center"><?php echo number_format($totalProduct);?>đ</td>
                                </tr>
<?php
        }
?>
                                <tr>
                                    <th class="text-right" colspan="2">Phí ship</th>
                                    <td class="text-center">
<?php
    echo number_format($ship);
?>đ
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right" colspan="2">Tổng tiền</th>
                                    <td class="text-center">
<?php
    $totalship = 0;
    $totalship = $total + $ship;
    echo number_format($totalship);
?>đ
<input class="d-none" type="text" name="sumTotal" value="<?php echo $totalship;?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-5">
                                <h3>Hình thức thanh toán</h3>
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="payment" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Chuyển khoản</label>
                                                    </div>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <strong>
                                                <em>Tài khoản ngân hàng:</em>
                                            </strong>
                                            <br>
                                                Vietcombank chi nhánh Hùng Vương
                                            <br>
                                                Nguyễn An Hòa
                                            <br>
                                                0421*********
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="payment" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Thanh toán khi nhận hàng</label>
                                                </div>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                Nhận hàng rồi thanh toán.
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
    //if(isset($_SESSION['email']) && isset($_SESSION['product'])){
?>
                                <div class="d-flex">
                                    <button type="submit" name="cart" class="btn btn-danger ml-auto mt-3 mb-3">Thanh toán</button>
                                </div>
<?php
    //}else{
?><!--
                                <fieldset disabled>
                                    <div class="d-flex">
                                        <button type="submit" name="cart" class="btn btn-danger ml-auto mt-3 mb-3">Đăng nhập trước khi thanh toán</button>
                                    </div>
                                </fieldset>-->
<?php
    //}
?>
                            </div>
                            <div class="col-md-7">
                                <div class="shadow p-3 mb-5 bg-white rounded">
                                    <h4 class="text-danger">Một số lưu ý khi mua hàng</h4>
                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            Mỗi 1 ốp lưng chỉ được mua tối đa 5 cái, 
                                            nếu khách hàng muốn mua trên 5 cái xin liên hệ 
                                            với cửa hàng để đặt hàng.
                                        </li>
                                        <li class="list-group-item">
                                            Với khách hàng chọn hình thức thanh toán chuyển khoản,
                                            nội dung chuyển khoản khách hàng hãy ghi như sau:
                                            <div class="alert alert-info">
                                                Họ và tên khách hàng, tên sản phẩm, số lượng
                                            </div>
                                            Sau khi chuyển khoản thành công, sẽ có nhân viên gọi điện để xác nhận đơn hàng.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
    }else{
?>
<!--Cart-->
<section>
    <div class="container mt-5 mb-5 font-roboto" style="height: 40vh;">
        <h1 class="text-center mt-5 pt-5">Giỏ hàng trống.</h1>
    </div>
</section>
<?php
    }
?>