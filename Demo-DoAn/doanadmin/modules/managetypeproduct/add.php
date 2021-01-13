<!--Add-->
<section>
    <div class="container mt-5 mb-5 font-roboto" style="height: 525px;">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=typeproduct&ac=list">Quay lại</a>
        </div>
        <div class="mt-3">
            <form action="../modules/managetypeproduct/handling.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name-type">Tên loại</label>
                        <input type="text" name="name-type" class="form-control" id="name-type" placeholder="Nhập tên loại">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Tình trạng</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Kích hoạt</option>
                            <option value="2">Không kích hoạt</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex">
                <input class="btn btn-danger ml-auto" type="submit" name="add" value="Thêm loại">
                </div>
            </form>
        </div>
    </div>
</section>