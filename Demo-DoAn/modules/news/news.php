<?php
    $sql = "SELECT 
                * 
            FROM 
                `news` 
            WHERE 
                `status` = 0";
    $row = mysqli_query($conn, $sql);
    
?>
<!--News-->
<section>
    <div class="container font-roboto mt-5 mb-5">
        <div class="row">
        <?php
            while($new = mysqli_fetch_array($row)){
        ?>
        <div class="card post-image col-md-6">
            <span class="image-placeholder text-center">
                <img src="../doanadmin/modules/managenews/uploads/<?php echo $new['img'];?>" class="card-img-top w-50" alt="...">
            </span>
            <span class="thumbal-over"></span>
            <div class="card-body">
                <h3 class="card-title"><?php echo mb_strtoupper($new['title']);?></h3>
                <p class="card-text">
                    <?php
                        if(strlen($new['content']) > 500){
                            $content = substr($new['content'], 0, 420).'...';
                            echo $content;
                        }
                    ?>
                </p>
                <a href="../views/index.php?manage=news_detail&id=<?php echo $new['id_new'];?>" class="text-danger">
                    <strong>Đọc tiếp</strong> 
                    <i class="fas fa-angle-double-right"></i>
                </a>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
</section>