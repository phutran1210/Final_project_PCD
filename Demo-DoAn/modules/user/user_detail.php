<?php
    $sqlUser = "SELECT 
                    * 
                FROM 
                    `user` 
                WHERE 
                    `id` = '$_SESSION[idUser]'";
    $resultUser = mysqli_query($conn, $sqlUser);
    $rowUser = mysqli_fetch_array($resultUser);
    $sqlCart = "SELECT 
                    * 
                FROM 
                    `cart`
                WHERE 
                    `id_user` = '$_SESSION[idUser]' 
                ORDER BY `id_cart` DESC 
                LIMIT 0, 3";
    $resultCart = mysqli_query($conn, $sqlCart);
?>
<!--User-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
            <h3 class="mr-auto">Quản lý tài khoản</h3>
        <div class="row">
            <div class="col-md-5">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <h5>Thông tin cá nhân</h5>
                    <ul>
                        <li>
                            <?php echo $rowUser['name'];?>
                        </li>
                        <li>
                            <?php echo $rowUser['email'];?>
                        </li>
                        <li>
                            <?php echo $rowUser['phone'];?>
                        </li>
                        <li>
                            <?php echo $rowUser['address'];?>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a class="ml-auto text-danger" href="?manage=updateuser">
                            Thay đổi thông tin
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="shadow p-3 mb-5 bg-white rounded">
                    <h5>Đơn hàng gần đây</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tổng cộng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($list = mysqli_fetch_array($resultCart)){
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $list['id_cart'];?>
                                </th>
                                <td>
                                    <?php
                                        $date = explode(' ', $list['dateCreated']);
                                        echo $date[0];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $sqlDetail = "SELECT * FROM `cart_detail`, `product` 
                                                    WHERE `cart_detail`.`id_product` = `product`.`id_product` 
                                                    AND `id_cart` = '$list[id_cart]'";
                                        $resultDetail = mysqli_query($conn, $sqlDetail);
                                        while($listDetail = mysqli_fetch_array($resultDetail)){
                                    ?>
                                    <img style="width: 25px;" class="mb-2" src="../doanadmin/modules/manageproduct/uploads/<?php echo $listDetail['img_1'];?>" title="<?php echo $listDetail['product_name'];?>">
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php echo number_format($list['totalPrice']).'đ';?>
                                </td>
                                <td>
                                    <?php
                                        if($list['status'] == 1){
                                    ?>
                                    <a href="?manage=view_cart&id=<?php echo $list['id_cart'];?>" class="text-warning">Đang giao hàng</a>
                                    <?php
                                        }elseif($list['status'] == 2){
                                    ?>
                                    <a href="?manage=view_cart&id=<?php echo $list['id_cart'];?>" class="text-success">Đã thanh toán</a>
                                    <?php
                                        }elseif($list['status'] == 3){
                                    ?>
                                    <a href="?manage=view_cart&id=<?php echo $list['id_cart'];?>" class="text-danger">Hủy đơn</a>
                                    <?php
                                        }else{
                                    ?>
                                    <a href="?manage=view_cart&id=<?php echo $list['id_cart'];?>" class="text-warning">Chờ thanh toán</a>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <p>
                        <?php
                            
                        ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>