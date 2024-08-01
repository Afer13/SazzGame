<?php include 'header.php';
include 'baglan.php';
error_reporting(0);
?>


<hr>
<div class="text-center mb-5">
    <h1><?php if ($_GET['app_kateqoriya']) {
            echo $_GET['app_kateqoriya'];
        } else {
            echo "PROQRAMLARIN";
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

                        $axtar = $db->prepare("SELECT * FROM proqram where app_ad=:app_ad order by app_date asc LIMIT 1");
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
                                    <a class="blog-overlay text-decoration-none" href="">
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

                        $result = $db->prepare("SELECT DISTINCT * FROM proqram where app_kateqoriya=:app_kateqoriya order by app_date asc LIMIT $offset, $total_records_per_page");
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
                                    <a class="blog-overlay text-decoration-none" href="">
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

                        $result = $db->prepare("SELECT DISTINCT * FROM proqram order by app_date asc LIMIT $offset, $total_records_per_page");
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
                                <a class="blog-overlay text-decoration-none" href="appdetal.php?app_table=proqram&app_id=<?php echo  $resultCek['app_id']; ?>">
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
                                <?php include 'sayfalama/sayfalama_pro.php' ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
                                                                                <?php } ?>
            <!--side bar -->
            <div class="col-lg-4 mt-5 mt-lg-0">


                <!-- Search Form -->
                <div class="mb-5">
                    <form action="proqramlar.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Proqram Axtar..." name="axtarilan">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><button name="axtar" style="border: none; background:#fff" type="submit"><i class="fa fa-search"></i></button></span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Kateqoriya</h3>
                    <ul class="list-group list-group-flush">
                        <li id="Qulluğ" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Qulluğ" class="text-decoration-none h6 m-0">Qulluğ</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Qulluğ"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Avadanlıq" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Avadanlıq" class="text-decoration-none h6 m-0">Avadanlıq</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Avadanlıq"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Təhsil" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Təhsil" class="text-decoration-none h6 m-0">Təhsil</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Təhsil"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Lazımlı" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Lazımlı" class="text-decoration-none h6 m-0">Lazımlı</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Lazımlı"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Anti-Virus" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Anti-Virus" class="text-decoration-none h6 m-0">Anti-Virus</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Anti-Virus"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="İnternet" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=İnternet" class="text-decoration-none h6 m-0">İnternet</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "İnternet"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Montaj" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Montaj" class="text-decoration-none h6 m-0">Montaj</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Montaj"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Multimedia" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Multimedia" class="text-decoration-none h6 m-0">Multimedia</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Multimedia"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Ofis" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Ofis" class="text-decoration-none h6 m-0">Ofis</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Ofis"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
                        </li>
                        <li id="Dizayn" class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="proqramlar.php?app_kateqoriya=Dizayn" class="text-decoration-none h6 m-0">Dizayn</a>
                            <span class="badge badge-primary badge-pill"><?php $say = $db->prepare("SELECT * FROM proqram where app_kateqoriya=:app_kateqoriya");
                                                                            $say->execute(array(
                                                                                'app_kateqoriya' => "Dizayn"
                                                                            ));
                                                                            echo $say->rowCount(); ?></span>
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
        document.querySelector('#<?php echo $_GET['app_kateqoriya']; ?>').style.background = "rgba(98, 27, 231, 0.336)";
        document.querySelector('#<?php echo $_GET['app_kateqoriya']; ?>').style.borderRadius = "3px";

    <?php } else { ?>
        // document.querySelector('#<?php echo $_GET['app_kateqoriya']; ?>').style.background ="";
    <?php } ?>
</script>

<?php include 'footer.php' ?>