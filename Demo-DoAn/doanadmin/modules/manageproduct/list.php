<?php
    $sql_list = "SELECT 
                    count(`id_product`) as total 
                FROM 
                    `product`, `type_products` 
                WHERE 
                    `type_products`.`id_type` = `product`.`id_type` 
                ORDER BY `product`.`id_product` DESC";
    $result = mysqli_query($conn, $sql_list);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
        $current_page = $total_page;
    }else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($conn, "SELECT 
                                        `id_product`, `type_name`, `product_name`, 
                                        `amount`, `img_1`, `img_2`, 
                                        `price`, `content`, `product`.
                                        `dateCreated` AS `dayCreate`, `product`.`dateUpdate` AS `dayUpdate` 
                                    FROM 
                                        `product`, `type_products` 
                                    WHERE 
                                        `type_products`.`id_type` = `product`.`id_type` 
                                    ORDER BY `product`.`id_product` DESC 
                                    LIMIT $start, $limit");
?>

<!--List-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 ml-auto" href="index.php?manage=product&ac=add">Thêm mới</a>
        </div>

        <div>
            <table class="table table-hover vertical-middle text-center table-sm">
                <thead>
                    <tr>
                    <th scope="col">Mã SP</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thông tin</th>
                    <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($list = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $list['id_product'];?></th>
                        <td class="text-left">
                            <a class="" href="index.php?manage=gallery&ac=list&id=<?php echo $list['id_product'];?>" data-toggle="tooltip" data-placement="bottom" title="Danh sách ảnh <?php echo $list['product_name'];?>">
                            <img style="width: 50px;" src="/doan/doanadmin/modules/manageproduct/uploads/<?php echo $list['img_1'];?>" alt="">
                            </a>
                            <?php echo $list['product_name'];?>
                        </td>
                        <td class="text-left">
                            <ul class="m-0">
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
                                    Ngày tạo: 
                                    <?php 
                                        $dateCreated = explode(' ', $list['dayCreate']);
                                        echo $dateCreated[0];
                                    ?>
                                </li>
                                <li>
                                    Sửa đổi: 
                                    <?php 
                                        $dateCreated = explode(' ', $list['dayCreate']);
                                        echo $dateCreated[0];
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a class="text-danger" href="index.php?manage=product&ac=update&id=<?php echo $list['id_product'];?>" data-toggle="tooltip" data-placement="bottom" title="Sửa sản phẩm"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a class="text-danger" href="../modules/manageproduct/handling.php?id=<?php echo $list['id_product'];?>" data-toggle="tooltip" data-placement="bottom" title="Xóa sản phẩm">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <div class="btn-group mt-3 ml-auto" role="group" aria-label="Basic example">
                <?php
                    if ($current_page > 1 && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=product&ac=list&page='.($current_page-1).'">
                                Previous
                            </a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<a class="btn btn-outline-danger active" href="index.php?manage=product&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }else{
                            echo '<a class="btn btn-outline-danger" href="index.php?manage=product&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=product&ac=list&page='.($current_page+1).'">
                                Next
                            </a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
