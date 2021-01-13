<?php
    if(isset($_POST['search'])){
        $search = $_POST['product'];
        //echo 'Sản phẩm cần tìm: <strong class="mt-3 mb-3">'.$search.'</strong>';
        $sql_search = "SELECT 
                            `id_product`, 
                            `type_name`, 
                            `product_name`, 
                            `amount`, 
                            `img_1`, 
                            `img_2`, 
                            `price`, 
                            `content`, 
                            `product`.`dateCreated` AS `dayCreate`, 
                            `product`.`dateUpdate` AS `dayUpdate` 
                        FROM 
                            `product`, `type_products` 
                        WHERE 
                            `type_products`.`id_type` = `product`.`id_type` 
                            AND (`product_name` LIKE '%$search%'
                            OR `type_name` LIKE '%$search%'
                            OR `price` LIKE '%".$search."%' 
                            OR `product`.`dateCreated` LIKE '%".$search."%')";
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
                    <th scope="col">Mã SP</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Loại hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thông tin</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($list = mysqli_fetch_assoc($row_search)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $list['id_product'];?></th>
                        <td class="text-left">
                            <a class="" href="index.php?manage=gallery&ac=list&id=<?php echo $list['id_product'];?>" data-toggle="tooltip" data-placement="bottom" title="Danh sách ảnh <?php echo $list['product_name'];?>">
                                <img style="width: 50px;" src="/doan/assets/img_products/<?php echo $list['img_1'];?>" alt="">
                            </a>
                            <?php echo $list['product_name'];?>
                        </td>
                        <td><?php echo $list['type_name'];?></td>
                        <td class="text-left">
                            <ul class="">
                                <li>
                                    Số lượng: <?php echo $list['amount'];?>
                                </li>
                                <li>
                                    Tình trạng:
                                    <?php
                                        if($list['amount'] <= 0){
                                            echo '<span class="text-danger">Hết hàng</span>';
                                        }elseif($list['amount'] > 0 && $list['amount'] <= 5){
                                            echo '<span class="text-warning">Sắp hết hàng</span>';
                                        }else{
                                            echo '<span class="text-success">Còn hàng</span>';
                                        }
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td class="text-left">
                            <ul class="m-0">
                                <li>
                                    Ngày tạo: <?php echo $list['dayCreate'];?>
                                </li>
                                <li>
                                    Sửa đổi lần cuối: </br>
                                    <?php echo $list['dayUpdate'];?>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a class="text-danger" href="index.php?manage=product&ac=update&id=<?php echo $list['id_product'];?>" data-toggle="tooltip" data-placement="bottom" title="Sửa sản phẩm"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <button type="button" class="btn text-danger" data-toggle="modal" data-target="#exampleModal"  data-toggle="tooltip" data-placement="bottom" title="Xóa sản phẩm">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa sản phẩm này.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                        <a class="btn btn-danger" href="../modules/manageproduct/handling.php?id=<?php echo $list['id_product'];?>">Xóa sản phẩm</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
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