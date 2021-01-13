<!--Update-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="col-md-6 mr-auto ml-auto  pt-3 pb-3">
        <h3>Cập nhật thông tin</h3>
        <form action="../modules/user/handling.php?id=<?php echo $_SESSION['idUser'];?>" method="post">
            <div class="form-group">
                <label for="fullName">Họ và tên</label>
                <input name="fullname" type="fullname" class="form-control" id="fullName" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="Phone"">Số điện thoại</label>
                <input name="phone" type="" class="form-control" id="Phone" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="Address">Địa chỉ</label>
                <input name="address" type="address" class="form-control" id="Address" aria-describedby="emailHelp">
            </div>
            <div class="d-flex mb-3">
                <button name="update" type="submit" class="btn btn-danger ml-auto">
                    Cập nhật
                </button>
            </div>
        </form>
        </div>
    </div>
</section>