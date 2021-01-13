<?php
    $sql_list = "SELECT 
                    count(`id_rate`) as total 
                FROM 
                    `rate`";
    $result = mysqli_query($conn, $sql_list);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
        $current_page = $total_page;
    }else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($conn, "SELECT 
                                        `id_rate`, 
                                        `product_name`, 
                                        `name_user`, 
                                        `rate`.`dateCreate` as `dayCreate` 
                                    FROM 
                                        `rate`, `product` 
                                    WHERE 
                                        `rate`.`id_product` = `product`.`id_product` 
                                    ORDER BY `id_rate` DESC
                                    LIMIT $start, $limit ");

?>
<!--Rate-->
<section>
    <div class="container mt-5 mb-5 font-roboto">

        <div>
            <table class="table table-hover vertical-middle table-sm">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">Mã BL</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Tên người BL</th>
                    <th scope="col">Ngày BL</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($list = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $list['id_rate'];?></td>
                        <td><?php echo $list['product_name'];?></td>
                        <td><?php echo $list['name_user'];?></td>
                        <td><?php echo $list['dayCreate'];?></td>
                        <td>
                            <a class="text-success" href="index.php?manage=rate&ac=view&id=<?php echo $list['id_rate'];?>" data-toggle="tooltip" data-placement="bottom" title="Xem bình luận">
                                <i class="fas fa-eye"></i>
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
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=rate&ac=list&page='.($current_page-1).'">
                                Previous
                            </a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<a class="btn btn-outline-danger active" href="index.php?manage=rate&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }else{
                            echo '<a class="btn btn-outline-danger" href="index.php?manage=rate&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=rate&ac=list&page='.($current_page+1).'">
                                Next
                            </a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>