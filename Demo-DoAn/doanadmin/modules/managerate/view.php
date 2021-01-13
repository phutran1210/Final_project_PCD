<?php
    $sqlViewRate = "SELECT 
                        `id_rate`, 
                        `product_name`, 
                        `name_user`, 
                        `email`, 
                        `comment`, 
                        `rate`.`dateCreate` as `dayCreate` 
                    FROM 
                        `rate`, `product` 
                    WHERE 
                        `rate`.`id_product` = `product`.`id_product` 
                        AND `id_rate` = '$_GET[id]'";
    $rowViewRate = mysqli_query($conn, $sqlViewRate);
    $viewRate = mysqli_fetch_array($rowViewRate);
?>
<!--View-->
<section>
    <div class="container mt-5 mb-5 font-roboto">
        <div class="d-flex">
            <a class="btn btn-danger mb-2 mr-auto" href="index.php?manage=rate&ac=list">Quay lại</a>
        </div>
        <div class="mt-3">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin bình luận</h3>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Tên sản phẩm :</h5>
                        </div>
                        <div class="col-md-9">
                            <?php echo $viewRate['product_name'];?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Tên :</h5>
                        </div>
                        <div class="col-md-9">
                            <?php echo $viewRate['name_user'];?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Email :</h5>
                        </div>
                        <div class="col-md-9">
                            <?php echo $viewRate['email'];?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Bình luận :</h5>
                        </div>
                        <div class="col-md-9">
                            <?php echo $viewRate['comment'];?>
                        </div>
                    </div>
                    <footer class="blockquote-footer">
                        Được bình luận vào 
                        <cite title="Source Title">
                            <?php echo $viewRate['dayCreate'];?>
                        </cite>
                    </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>