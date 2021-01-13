<?php
    $sql_list = "SELECT 
                    count(`id_type`) as total 
                FROM 
                    `type_products` 
                ORDER BY `id_type` DESC";
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
                                        * 
                                    FROM 
                                        `type_products` 
                                    ORDER BY `id_type` DESC
                                    LIMIT $start, $limit ");
?>

<!--Type product-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 ml-auto" href="index.php?manage=typeproduct&ac=add">Thêm mới</a>
        </div>

        <div>
            <table class="table table-hover vertical-middle text-center">
                <thead>
                    <tr>
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên loại</th>
                    <th scope="col">Tình trạng</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($type = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?php echo $type['id_type'];?></td>
                        <td><?php echo $type['type_name'];?></td>
                        <td>
                            <?php 
                                if($type['status'] == 1){
                                    echo 'Kích hoạt';
                                }elseif ($type['status'] == 2) {
                                    echo 'Không kích hoạt';
                                }
                            ?>
                        </td>
                        <td>
                            <a class="text-danger" href="index.php?manage=typeproduct&ac=update&id=<?php echo $type['id_type'];?>" data-toggle="tooltip" data-placement="bottom" title="Sửa loại sản phẩm"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a class="text-danger" href="../modules/managetypeproduct/handling.php?id=<?php echo $type['id_type'];?>" data-toggle="tooltip" data-placement="bottom" title="Xóa loại sản phẩm"><i class="fas fa-times"></i></a>
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
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=typeproduct&ac=list&page='.($current_page-1).'">
                                Previous
                            </a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<a class="btn btn-outline-danger active" href="index.php?manage=typeproduct&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }else{
                            echo '<a class="btn btn-outline-danger" href="index.php?manage=typeproduct&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=typeproduct&ac=list&page='.($current_page+1).'">
                                Next
                            </a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>