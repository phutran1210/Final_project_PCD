<?php
    if(isset($_POST['search'])){
        $search = $_POST['user'];
        //echo 'Sản phẩm cần tìm: <strong class="mt-3 mb-3">'.$search.'</strong>';
        $sql_search = "SELECT 
                            * 
                        FROM 
                            `user` 
                        WHERE 
                            `name` LIKE '%".$search."%'
                            OR `email` LIKE '%".$search."%'
                            OR `phone` LIKE '%".$search."%'
                            OR `address` LIKE '%".$search."%'
                            OR `dateCreated` LIKE '%".$search."%'";
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
                    <th scope="col">Mã KH</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Ngày đăng ký</th>
                    <th colspan="2">Xử lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while($list = mysqli_fetch_assoc($row_search)){
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
                                    Số điện thoại:
                                    <?php echo $list['phone'];?>
                                </li>
                                <li>
                                    Địa chỉ:
                                    <?php echo $list['address'];?>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <?php echo $list['dateCreated'];?>
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