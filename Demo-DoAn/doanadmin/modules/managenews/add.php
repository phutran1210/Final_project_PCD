<!--Thêm bài viết-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=news&ac=list">Quay lại</a>
        </div>
        <div class="mt-3">
            <form class="" action="../modules/managenews/handling.php" method="post" enctype="multipart/form-data">
                <h3 class="mb-3">Thêm bài viết</h3>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Tiêu đề bài viết</label>
                        <input name="title" type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Tình trạng</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                        <div class="custom-file">
                            <input name="img" type="file" class="custom-file-input" id="img">
                            <label class="custom-file-label" for="img" data-browse="Thư mục">Chọn ảnh tiêu đề bài viết</label>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="3"></textarea>
                </div>
                <div class="d-flex">
                    <input class="btn btn-danger ml-auto" type="submit" name="add" value="Thêm bài viết">
                </div>
            </form>
        </div>
    </div>
</section>