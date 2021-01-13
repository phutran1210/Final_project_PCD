<?php
    $sql = "SELECT 
                * 
            FROM 
                `news` 
            WHERE 
                `id_new` = '$_GET[id]'";
    $row = mysqli_query($conn, $sql);
    $new = mysqli_fetch_array($row);
    //echo $new['content'];
?>
<!--New detail-->
<section>
    <div class="container mt-2 mb-5">
        <div class="card post-image">
            <span class="image-placeholder text-center">
                <img src="../doanadmin/modules/managenews/uploads/<?php echo $new['img'];?>" class="card-img-top w-50" alt="...">
            </span>
            <div class="card-body">
                <h1 class="card-title">
                    <?php echo mb_strtoupper($new['title']);?>
                </h1>
                <small>
                    <?php
                        $date = $new['dateUpdate'];
                        $dateExplode = explode(' ', $date);
                        $dateDay = $dateExplode[0];
                        $dateExplode2 = explode('-', $dateDay);
                        $dateY = $dateExplode2[0];
                        $dateM = $dateExplode2[1];
                        $dateD = $dateExplode2[2];
                        switch($dateM){
                            case '01': $month = 'Tháng 1';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '02': $month = 'Tháng 2';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '03': $month = 'Tháng 3';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '04': $month = 'Tháng 4';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '05': $month = 'Tháng 5';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '06': $month = 'Tháng 6';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '07': $month = 'Tháng 7';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '08': $month = 'Tháng 8';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '09': $month = 'Tháng 9';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '10': $month = 'Tháng 10';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '11': $month = 'Tháng 11';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                            case '12': $month = 'Tháng 12';
                            echo mb_strtoupper($dateD.' '.$month.' '.$dateY);
                                break;
                        }
                    ?>
                </small>
                <p class="card-text">
                    <?php
                        echo $new['content'];
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>