<?php
    $sql_list = "SELECT 
                    count(`id_new`) as total 
                FROM 
                    `news` 
                ORDER BY `id_new` DESC";
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
                                        `news` 
                                    ORDER BY `id_new` DESC
                                    LIMIT $start, $limit ");
?>

<!--List-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 ml-auto" href="index.php?manage=news&ac=add">Thêm mới</a>
        </div>
        
        <div>
            <table class="table table-hover vertical-middle text-center table-sm">
                <thead>
                    <tr>
                    <th scope="col">Mã BV</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày đăng</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($list = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $list['id_new'];?></th>
                        <td class="text-left">
                            <?php 
                                if(strlen($list['title']) > 0){
                                    $title = mb_substr($list['title'], 0, 50).'...';
                                    echo $title;
                                }
                            //echo $list['title'];
                            ?>
                        </td>
                        <td class="">
                            <?php 
                                if($list['status'] == 0){
                                    echo 'Kích hoạt';
                                }elseif ($list['status'] == 1) {
                                    echo 'Không kích hoạt';
                                }
                            ?>
                        </td>
                        <td class="text-left p-0">
                            <ul class="m-0">
                                <li>
                                    Ngày tạo: 
                                    <?php
                                        $dateCreated = explode(' ', $list['dateCreate']);
                                        echo $dateCreated[0];
                                    ?>
                                </li>
                                <li>
                                    Cập nhật: 
                                    <?php
                                        $dateUpdate = explode(' ', $list['dateUpdate']);
                                        echo $dateUpdate[0];
                                    ?>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a class="text-danger" href="index.php?manage=news&ac=update&id=<?php echo $list['id_new'];?>" data-toggle="tooltip" data-placement="bottom" title="Sửa bài viết"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a class="text-danger" href="../modules/manageproduct/handling.php?id=<?php echo $list['id_new'];?>" data-toggle="tooltip" data-placement="bottom" title="Xóa bài viết">
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
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=news&ac=list&page='.($current_page-1).'">
                                Previous
                            </a>';
                    }
                    for ($i = 1; $i <= $total_page; $i++){
                        if ($i == $current_page){
                            echo '<a class="btn btn-outline-danger active" href="index.php?manage=news&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }else{
                            echo '<a class="btn btn-outline-danger" href="index.php?manage=news&ac=list&page='.$i.'">'
                                    .$i.
                                '</a>';
                        }
                    }
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<a class="btn btn-outline-danger" href="index.php?manage=news&ac=list&page='.($current_page+1).'">
                                Next
                            </a>';
                    }
                ?>
            </div>
        </div>
    </div>

</section>