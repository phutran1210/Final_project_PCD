<?php
    $sql_type = "SELECT 
                    * 
                FROM 
                    `type_products` 
                WHERE 
                    `id_type` = '$_GET[id]'";
    $row_type = mysqli_query($conn, $sql_type);
    $type = mysqli_fetch_array($row_type);

?>

<!--Update-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=typeproduct&ac=list">Danh sách loại sản phẩm</a>
        </div>
        <div class="mt-3">
            <form action="../modules/managetypeproduct/handling.php?id=<?php echo $type['id_type'];?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name-type">Tên loại</label>
                        <input type="text" name="name-type" class="form-control" id="name-type" value="<?php echo $type['type_name']?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Tình trạng</label>
                        <select name="status" id="status" class="form-control">
                            <?php
                                if($type['status'] == 1){
                            ?>
                            <option value="1" selected>Kích hoạt</option>
                            <option value="2">Không kích hoạt</option>
                            <?php
                                }elseif($type['status'] == 2){
                            ?>
                            <option value="1">Kích hoạt</option>
                            <option value="2" selected>Không kích hoạt</option>
                            <?php
                                }
                            ?>
                                
                        </select>
                    </div>
                </div>
                <div class="d-flex">
                    <input class="btn btn-danger ml-auto" type="submit" name="update" value="Sửa loại">
                </div>
            </form>
        </div>
    </div>
</section>