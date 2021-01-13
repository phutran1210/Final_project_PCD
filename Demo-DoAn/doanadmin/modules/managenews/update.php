<?php
    $sql_news = "SELECT 
                    * 
                FROM 
                    `news` 
                WHERE 
                    `id_new` = '$_GET[id]'";
    $row_news = mysqli_query($conn, $sql_news);
    $news = mysqli_fetch_array($row_news);

?>

<!--Update-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=news&ac=list">Quay lại</a>
        </div>
        <div class="mt-3">
            <form class="" action="../modules/managenews/handling.php?id=<?php echo $news['id_new'];?>" method="post" enctype="multipart/form-data">
                <h3 class="mb-3">Thêm bài viết</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Tiêu đề bài viết</label>
                        <input name="title" type="text" class="form-control" id="title" value="<?php echo $news['title'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Tình trạng</label>
                        <label for="status">Tình trạng</label>
                        <select name="status" id="status" class="form-control">
                            <?php
                                if($news['status'] == 0){
                            ?>
                            <option value="0" selected>Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                            <?php
                                }elseif($news['status'] == 1){
                            ?>
                            <option value="0">Kích hoạt</option>
                            <option value="1" selected>Không kích hoạt</option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                        <div class="custom-file">
                            <input name="img" type="file" class="custom-file-input" id="img">
                            <label class="custom-file-label" for="img" data-browse="Thư mục"></label>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="3"><?php echo $news['content'];?></textarea>
                </div>
                <div class="d-flex">
                    <input class="btn btn-danger ml-auto" type="submit" name="update" value="Sửa bài viết">
                </div>
            </form>
        </div>

    </div>
</section>