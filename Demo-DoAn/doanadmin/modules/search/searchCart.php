<?php
    if(isset($_POST['search'])){
        $search = '';
        $status = '';
        $sql_search = '';
        if($_POST['cart'] == 'Đang giao hàng'){
            $status = 1;
            $sql_search = "SELECT 
                                * 
                            FROM 
                                `cart`, `user` 
                            WHERE 
                                `cart`.`id_user` = `user`.`id` 
                                AND (`status` = '$status')";
        }elseif($_POST['cart'] == 'Đã thanh toán'){
            $status = 2;
            $sql_search = "SELECT 
                                * 
                            FROM 
                                `cart`, `user` 
                            WHERE 
                                `cart`.`id_user` = `user`.`id` 
                                AND (`status` = '$status')";
        }elseif($_POST['cart'] == 'Hủy đơn'){
            $status = 3;
            $sql_search = "SELECT 
                                * 
                            FROM 
                                `cart`, `user` 
                            WHERE 
                                `cart`.`id_user` = `user`.`id` 
                                AND (`status` = '$status')";
        }elseif($_POST['cart'] == 'Chờ thanh toán'){
            $status = 0;
            $sql_search = "SELECT 
                                * 
                            FROM 
                                `cart`, `user` 
                            WHERE 
                                `cart`.`id_user` = `user`.`id` 
                                AND (`status` = '$status')";
        }else{
            $search = $_POST['cart'];
            $sql_search = "SELECT 
                                * 
                            FROM 
                                `cart`, `user` 
                            WHERE 
                                `cart`.`id_user` = `user`.`id` 
                                AND (`name` LIKE '%".$search."%'
                                OR `phone` LIKE '%".$search."%')";
        }
        $row_search = mysqli_query($conn, $sql_search);
        $count = mysqli_num_rows($row_search);
        if($count > 0){
?>
<!--Search-->
<section>
    <div class="contaner mt-5 mb-5 font-roboto">
        <h3 class="mt-3 mb-3">Có <?php echo $count;?> kết quả tìm kiếm</h3>
        <h5>Thông tin cần tìm: <strong class="mt-3 mb-3"> <?php echo $search;?></strong></h5>
        <div>
        <table class="table table-hover vertical-middle text-center">
                <thead>
                    <tr>
                    <th scope="col">Mã ĐH</th>
                    <th scope="col">Thông tin khách hàng</th>
                    <th scope="col">Thông tin đơn hàng</th>
                    <th scope="col">Thời gian</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($list = mysqli_fetch_assoc($row_search)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $list['id_cart'];?></th>
                        <td class="text-left">
                            <ul class="m-0">
                                <li>
                                    <strong>Họ và tên: </strong>
                                    <?php echo $list['name'];?>
                                </li>
                                <li>
                                    <strong>Số điện thoại: </strong>
                                    <?php echo $list['phone'];?>
                                </li>
                            </ul>
                        </td>
                        <td class="text-left">
                            <ul class="m-0">
                                <li>
                                    <strong>Tổng tiền: </strong> 
                                    <?php
                                        echo number_format($list['totalPrice']) ;
                                    ?>
                                </li>
                                <li>
                                    <strong>Trạng thái: </strong>
                                    <?php
                                        if($list['status'] == 1){
                                            echo 'Đang giao hàng';
                                        }elseif($list['status'] == 2){
                                            echo 'Đã thanh toán';
                                        }elseif($list['status'] == 3){
                                            echo 'Hủy đơn';
                                        }else{
                                            echo 'Chờ thanh toán';
                                        }
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td class="text-left">
                            <ul class="m-0">
                                <li>
                                    <strong>Ngày mua: </strong>
                                    <?php echo $list['dateCreated'];?>
                                </li>
                                <li>
                                    <strong>Xử lý: </strong>
                                    <?php echo $list['dateUpdate'];?>
                                </li>
                            </ul>
                        </td>
                        <td class="text-left">
                            <?php
                                if($list['status'] == 2){
                            ?>
                            <a class="text-danger" href="index.php?manage=bill&ac=view&id=<?php echo $list['id_cart'];?>" data-toggle="tooltip" data-placement="bottom" title="Xem hóa đơn">
                                <i class="fas fa-check text-success"></i>
                            </a>
                            <?php
                                }elseif($list['status'] == 3){
                            ?>
                            <a class="text-danger" href="index.php?manage=bill&ac=view&id=<?php echo $list['id_cart'];?>" data-toggle="tooltip" data-placement="bottom" title="Xem hóa đơn">
                                <i class="fas fa-times text-danger"></i>
                            </a>
                            <?php
                                }else{
                            ?>
                                <a class="text-danger" href="index.php?manage=bill&ac=update&id=<?php echo $list['id_cart'];?>" data-toggle="tooltip" data-placement="bottom" title="Sửa thông tin">
                                    <i class="fas fa-edit"></i>
                                </a>
                            <?php
                                }
                            ?>
                        </td>
                        
                    </tr>
                    <?php
                            $i++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php
        }else{
?>
<div class="contaner mt-5 mb-5 font-roboto">
        <h3 class="mt-3 mb-3">Có <?php echo $count;?> kết quả tìm kiếm</h3>
        <h5>Thông tin cần tìm: <strong class="mt-3 mb-3"> 
            <?php echo $search;?></strong>
        </h5>
    </div>            
<?php
        }
    }
?>