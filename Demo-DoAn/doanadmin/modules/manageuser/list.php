<?php
    $sql_list = "SELECT 
                    count(`id`) as total 
                FROM 
                    `user` 
                ORDER BY `user`.`id` DESC";
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
                                        `user` 
                                    ORDER BY `user`.`id` DESC
                                    LIMIT $start, $limit ");
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
                    <th scope="col">Mã KH</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Ngày đăng ký</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($list = mysqli_fetch_assoc($result)){
                            if($list['id'] == 5){
                                continue;
                            }
                    ?>
                    <tr>
                        <th scope="row"><?php echo $list['id'];?></th>
                        <td class="text-left"><?php echo $list['name'];?></td>
                        <td class="text-left">
                            <ul class="m-0">
                                <li>
                                    Email: <?php echo $list['email'];?>
                                </li>
                                <li>
                                    Số điện thoại: <?php echo $list['phone'];?>
                                </li>
                                <li>
                                    Địa chỉ:
                                    <?php
                                        echo $list['address'];
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td><?php echo $list['dateCreated'];?></td>
                        <td>
                            <button type="button" class="btn text-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc muốn xóa khách hàng này.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                        <a class="btn btn-danger" href="../modules/manageuser/handling.php?id=<?php echo $list['id'];?>">Xóa thông tin</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=user&ac=list&page='.($current_page-1).'">
                                Previous
                            </a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<a class="btn btn-outline-danger active" href="index.php?manage=user&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }else{
                            echo '<a class="btn btn-outline-danger" href="index.php?manage=user&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=user&ac=list&page='.($current_page+1).'">
                                Next
                            </a>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
