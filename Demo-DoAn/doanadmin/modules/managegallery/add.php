<?php
    $id = $_GET['id'];
?>

<!--Add-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=gallery&ac=list&id=<?php echo $id;?>">Quay lại</a>
        </div>
        <h3>Thêm hình ảnh sản phẩm</h3>
        <form action="../modules/managegallery/handling.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="custom-file">
                    <input name="image-name[]" type="file" class="custom-file-input" id="img-1" multiple="multiple">
                    <label class="custom-file-label" for="img-1" data-browse="Thư mục">Chọn ảnh</label>
                </div>
            </div>
            <div class="d-flex">
            <input class="btn btn-danger ml-auto" type="submit" name="add" value="Thêm ảnh">
            </div>
        </form>
    </div>
</section>