<?php include 'header.php';
include 'baglan.php';
error_reporting(0);
?>

<hr>
<div class="text-center mb-5">
    <h1><?php if ($_GET['app_kateqoriya']) {
            echo $_GET['app_kateqoriya'];
        } else {
            echo "OYUNLARIN";
        } ?></h1>
    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"><?php if ($_GET['app_kateqoriya']) {
                                                                                    echo "KATEQORIYASI";
                                                                                } else {
                                                                                    echo "HAMISI";
                                                                                } ?></h5>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row pb-3">


                    <?php
                    include('baglan.php');

                    if (isset($_POST['axtar'])) {

                        $axtar = $db->prepare("SELECT * FROM games where app_ad=:app_ad LIMIT 1");
                        $axtar->execute(array(
                            'app_ad' => $_POST['axtarilan']
                        ));
                        $say=$axtar->rowCount();
                        if($say==0)
                        {
                           echo  "<h5 calss='text-primary text-uppercase mb-3' style='letter-spacing: 5px;'>Məlumat tapılmadı...</h5>";
                        }

                        //"SELECT * FROM `pagination_table` LIMIT $offset, $total_records_per_page"

                        while ($axtarCek = $axtar->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div class="col-lg-6 mb-4">
                                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                    <img style="max-width:350px" height="400" src="<?php if ($axtarCek['app_status'] == 1) {
                                                                                        echo  $axtarCek['app_img'];
                                                                                    } else {
                                                                                        echo  $axtarCek['app_img_demo'];
                                                                                    } ?>" alt="<?php echo  $axtarCek['app_ad']; ?>">
                                    <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($axtarCek['app_ad'].'/'.$axtarCek['app_id']) ?>">
                                        <h5 class="text-white mb-3"><?php echo $axtarCek['app_ad']; ?></h5>
                                        <p class="text-primary m-0"><?php echo $axtarCek['app_kateqoriya']; ?></p>
                                    </a>
                                </div>
                            </div>
                            <?php }
                    } else {


                        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                            $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                        }

                        $total_records_per_page = 8;
                        $offset = ($page_no - 1) * $total_records_per_page;
                        $previous_page = $page_no - 1;
                        $next_page = $page_no + 1;
                        $adjacents = "2";

                        if ($_GET['app_kateqoriya']) {




                            $result_count = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                            $result_count->execute(array(
                                'app_kateqoriya' => $_GET['app_kateqoriya']
                            ));
                            //  $proqramCek=$poqramSorgu->fetch(PDO::FETCH_ASSOC);



                            $total_records = $result_count->rowCount();
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1

                            $result = $db->prepare("SELECT DISTINCT * FROM games where app_kateqoriya=:app_kateqoriya order by app_date asc LIMIT $offset, $total_records_per_page");
                            $result->execute(array(
                                'app_kateqoriya' => $_GET['app_kateqoriya']
                            ));


                            //"SELECT * FROM `pagination_table` LIMIT $offset, $total_records_per_page"

                            while ($resultCek = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                                <div class="col-lg-6 mb-4">
                                    <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                        <img style="max-width:350px" height="400" src="<?php if ($resultCek['app_status'] == 1) {
                                                                                            echo  $resultCek['app_img'];
                                                                                        } else {
                                                                                            echo  $resultCek['app_img_demo'];
                                                                                        } ?>" alt="<?php echo  $resultCek['app_ad']; ?>">
                                        <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($resultCek['app_ad'].'/'.$resultCek['app_id']) ?>">
                                            <h5 class="text-white mb-3"><?php echo $resultCek['app_ad']; ?></h5>
                                            <p class="text-primary m-0"><?php echo $resultCek['app_kateqoriya']; ?></p>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>






                        <?php } else {

                            $result_count = $db->prepare("SELECT * FROM games");
                            $result_count->execute();
                            //  $proqramCek=$poqramSorgu->fetch(PDO::FETCH_ASSOC);



                            $total_records = $result_count->rowCount();
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1

                            $result = $db->prepare("SELECT DISTINCT * FROM games order by app_date asc LIMIT $offset, $total_records_per_page");
                            $result->execute();
                        }


                        //"SELECT * FROM `pagination_table` LIMIT $offset, $total_records_per_page"

                        while ($resultCek = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div class="col-lg-6 mb-4">
                                <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                    <img style="max-width:350px" height="400" src="<?php if ($resultCek['app_status'] == 1) {
                                                                                        echo  $resultCek['app_img'];
                                                                                    } else {
                                                                                        echo  $resultCek['app_img_demo'];
                                                                                    } ?>" alt="<?php echo  $resultCek['app_ad']; ?>">
                                    <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($resultCek['app_ad'].'/'.$resultCek['app_id']) ?>">
                                        <h5 class="text-white mb-3"><?php echo $resultCek['app_ad']; ?></h5>
                                        <p class="text-primary m-0"><?php echo $resultCek['app_kateqoriya']; ?></p>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="col-12">
                            <hr>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg justify-content-center mb-0">
                                    <?php include 'sayfalama/sayfalama.php' ?>
                                </ul>
                            </nav>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!--side bar -->
            <div class="col-lg-4 mt-5 mt-lg-0">


                <!-- Search Form -->
                <div class="mb-5">
                    <form action="games.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Oyun Axtar..." name="axtarilan">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><button name="axtar" style="border: none; background:#fff" type="submit"><i class="fa fa-search"></i></button></span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-4">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Kateqoriya</h3>
                    <ul class="list-group list-group-flush">
                        <li id="Aksiyon" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Aksiyon" class="text-decoration-none h6 m-0">Aksiyon</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Aksiyon"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Uşaq" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Uşaq" class="text-decoration-none h6 m-0">Uşaq</a>
                            <span class="badge badge-primary badge-pill"><?php $say1 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say1->execute(array(
                                                                                'app_kateqoriya' => "Uşaq"
                                                                            ));
                                                                            echo $say1->rowCount(); ?></span>
                        </li>
                        <li id="Döyüş" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Döyüş" class="text-decoration-none h6 m-0">Döyüş</a>
                            <span class="badge badge-primary badge-pill"><?php $say2 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say2->execute(array(
                                                                                'app_kateqoriya' => "Döyüş"
                                                                            ));
                                                                            echo $say2->rowCount(); ?></span>
                        </li>
                        <li id="Qorxu" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Qorxu" class="text-decoration-none h6 m-0">Qorxu</a>
                            <span class="badge badge-primary badge-pill"><?php $say3 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say3->execute(array(
                                                                                'app_kateqoriya' => "Qorxu"
                                                                            ));
                                                                            echo $say3->rowCount(); ?></span>
                        </li>
                        <li id="Məcara" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Məcara" class="text-decoration-none h6 m-0">Məcara</a>
                            <span class="badge badge-primary badge-pill"><?php $say4 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say4->execute(array(
                                                                                'app_kateqoriya' => "Məcara"
                                                                            ));
                                                                            echo $say4->rowCount(); ?></span>
                        </li>
                        <li id="Online" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Online" class="text-decoration-none h6 m-0">Online</a>
                            <span class="badge badge-primary badge-pill"><?php $say5 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say5->execute(array(
                                                                                'app_kateqoriya' => "Online"
                                                                            ));
                                                                            echo $say5->rowCount(); ?></span>
                        </li>
                        <li id="Müharibə" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Müharibə" class="text-decoration-none h6 m-0">Müharibə</a>
                            <span class="badge badge-primary badge-pill"><?php $say6 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say6->execute(array(
                                                                                'app_kateqoriya' => "Müharibə"
                                                                            ));
                                                                            echo $say6->rowCount(); ?></span>
                        </li>
                        <li id="Simuliyasiya" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Simuliyasiya" class="text-decoration-none h6 m-0">Simuliyasiya</a>
                            <span class="badge badge-primary badge-pill"><?php $say7 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say7->execute(array(
                                                                                'app_kateqoriya' => "Simuliyasiya"
                                                                            ));
                                                                            echo $say7->rowCount(); ?></span>
                        </li>
                        <li id="Spor" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Spor" class="text-decoration-none h6 m-0">Spor</a>
                            <span class="badge badge-primary badge-pill"><?php $say8 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say8->execute(array(
                                                                                'app_kateqoriya' => "Spor"
                                                                            ));
                                                                            echo $say8->rowCount(); ?></span>
                        </li>
                        <li id="Strategiya" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Strategiya" class="text-decoration-none h6 m-0">Strategiya</a>
                            <span class="badge badge-primary badge-pill"><?php $say9 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say9->execute(array(
                                                                                'app_kateqoriya' => "Strategiya"
                                                                            ));
                                                                            echo $say9->rowCount(); ?></span>
                        </li>
                        <li id="Yarış" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="games.php?app_kateqoriya=Yarış" class="text-decoration-none h6 m-0">Yarış</a>
                            <span class="badge badge-primary badge-pill"><?php $say10 = $db->prepare("SELECT * FROM games where app_kateqoriya=:app_kateqoriya");
                                                                            $say10->execute(array(
                                                                                'app_kateqoriya' => "Yarış"
                                                                            ));
                                                                            echo $say10->rowCount(); ?></span>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
<script>
    <?php if ($_GET['app_kateqoriya'])
    // style="background-color: rgba(98, 27, 231, 0.336);"
    { ?>
        document.querySelector('#<?php echo $_GET['app_kateqoriya']; ?>').style.background = "rgba(98, 27, 231, 0.336)"
    <?php } ?>
</script>

<?php include 'footer.php' ?>