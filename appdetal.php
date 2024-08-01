<?php include 'header.php';
include 'baglan.php';
error_reporting(0);
?>

<!-- Detail Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <style>
                        .line {
                            background-color: #ff6600;
                            color: #FFF;
                            padding: 10px;
                            text-align: center;
                            border-radius: 10px;
                            font-weight: 700;
                        }

                        #rarsifre {
                            background-color: #44425a;
                            border-radius: 10px;
                            padding: 10px;
                            color: #fff;

                        }

                        .butonkopya {
                            display: none;
                        }
                    </style>
                    <?php
                    if ($_GET['app_table']) {
                        $app_table = $_GET['app_table'];
                        $poqramSorgu = $db->prepare("SELECT * FROM $app_table where app_id=:id");
                        $poqramSorgu->execute(array(

                            'id' => $_GET['app_id']
                        ));
                        $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    } else {
                        $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id");
                        $poqramSorgu->execute(array(

                            'id' => $_GET['app_id']
                        ));
                        $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    } ?>

                    <!-- App ad -->
                    <h1 style="color: red;" class="mb-5"><?php echo $proqramCek['app_ad']; ?></h1>
                    <hr>
                    <h6 style="padding:7px;border-radius:4px;background:#ff6600;color:#fff;width:270px;text-align:center" class="mb-5">Yükləmə Linkləri Aşağıda</h6>
                    <!-- App content -->
                    <?php echo $proqramCek['app_content']; ?>



                </div>
            </div>



            <!--side bar -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="row pb-3">

                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(0, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                            </a>
                        </div>
                    </div>


                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(1, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>
                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(1, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>
                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(1, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>
                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(1, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>

                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(1, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>

                    <?php
                    $poqramSorgu = $db->prepare("SELECT * FROM app where app_id=:id and app_status=1");
                    $poqramSorgu->execute(array(
                        'id' => rand(1, 1500)
                    ));
                    $proqramCek = $poqramSorgu->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div style="width: 400px;margin-left: 30px;">
                        <div class="blog-item position-relative overflow-hidden rounded mb-2">
                            <img style="max-width: 100%;" height="400" src="<?php echo $proqramCek['app_img']; ?>" alt="">
                            <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($proqramCek['app_ad'].'/'.$proqramCek['app_id']) ?>">
                                <h5 class="text-white mb-3"><?php echo $proqramCek['app_ad']; ?></h5>
                                <p class="text-primary m-0">Jan 01, 2050</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Detail End -->

    <div id="bax"></div>
    <?php include 'footer.php' ?>