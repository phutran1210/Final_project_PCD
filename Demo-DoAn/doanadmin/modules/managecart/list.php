<?php
    $sql_list = "SELECT 
                    count(`id_cart`) as total 
                FROM 
                    `cart`, `user` 
                WHERE 
                    `user`.`id` = `cart`.`id_user` 
                ORDER BY `cart`.`id_cart` DESC";
    $result = mysqli_query($conn, $sql_list);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 7;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
        $current_page = $total_page;
    }else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($conn, "SELECT 
                                        * 
                                    FROM 
                                        `cart` 
                                    ORDER BY `cart`.`id_cart` DESC
                                    LIMIT $start, $limit ");
?>

<!--Cart-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div>
            <table class="table table-hover vertical-middle text-center table-sm">
                <thead>
                    <tr>
                    <th scope="col">Mã ĐH</th>
                    <th scope="col">Thông tin khách hàng</th>
                    <th scope="col">Thông tin đơn hàng</th>
                    <th scope="col">Thời gian</th>
                    <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($list = mysqli_fetch_assoc($result)){
                    ?>
                    <tr class="">
                        <th scope="row">
                            <?php echo $list['id_cart'];?>
                        </th>
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
                        <td class="text-left p-0">
                            <ul class="m-0">
                                <li>
                                    <strong>Tổng tiền: </strong> 
                                    <?php
                                        echo number_format($list['totalPrice']) ;
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td class="text-left p-0">
                            <ul class="m-0">
                                <li>
                                    <strong>Ngày mua: </strong>
                                    <?php 
                                        $dateCreated = explode(' ', $list['dateCreated']);
                                        echo $dateCreated[0];
                                    ?>
                                </li>
                                <li>
                                    <strong>Xử lý: </strong>
                                    <?php
                                        $dateUpdate = explode(' ', $list['dateUpdate']);
                                        echo $dateUpdate[0];
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <?php
                                if($list['status'] == 2){
                            ?>
                            <a class="text-danger" href="index.php?manage=bill&ac=view&id=<?php echo $list['id_cart'];?>" data-toggle="tooltip" data-placement="bottom" title="Xem hóa đơn">
                                <i class="fas fa-check text-success"></i>
                            </a>
                            <?php
                                }elseif($list['status'] == 1){
                            ?>
                            <a class="text-warning" href="index.php?manage=bill&ac=update&id=<?php echo $list['id_cart'];?>" data-toggle="tooltip" data-placement="bottom" title="Xem hóa đơn">
                                <i class="fas fa-retweet text-warning"></i>
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
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <div class="btn-group mt-3 ml-auto" role="group" aria-label="Basic example">
                <?php
                    if ($current_page > 1 && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=bill&ac=list&page='.($current_page-1).'">
                                Previous
                            </a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<a class="btn btn-outline-danger active" href="index.php?manage=bill&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }else{
                            echo '<a class="btn btn-outline-danger" href="index.php?manage=bill&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=bill&ac=list&page='.($current_page+1).'">
                                Next
                            </a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>