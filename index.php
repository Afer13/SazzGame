<?php include 'header.php';
include 'slider.php';
//html_entity_decode('&8211;', ENT_NOQUOTES, 'UTF-8');
?>






<div class="text-center mb-5">
    <h1>Oyunlar və Proqramların</h1>
    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">HAMISI</h5>
</div>
<hr>
<!-- Blog Start -->
<div class="container-fluid py-5 col-md-16">
    <div class="container py-5 col-md-16">
        <div class="row">
            <div class="col-md-16">
                <div class="row pb-3">

                    <?php
                    include('baglan.php');

                    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                    }

                    $total_records_per_page = 9;
                    $offset = ($page_no - 1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $result_count = $db->prepare("SELECT * FROM app");
                    $result_count->execute();
                    //  $proqramCek=$poqramSorgu->fetch(PDO::FETCH_ASSOC);



                    $total_records = $result_count->rowCount();
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total page minus 1

                    $result = $db->prepare("SELECT DISTINCT * FROM app order by app_date asc LIMIT $offset, $total_records_per_page");
                    $result->execute();


                    //"SELECT * FROM `pagination_table` LIMIT $offset, $total_records_per_page"

                    while ($resultCek = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                       
                        <div class="col-lg-4 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img style="max-width:350px;" height="300" src="<?php if($resultCek['app_status']==1){ echo  $resultCek['app_img'];}else{ echo  $resultCek['app_img_demo'];} ?>" alt="<?php echo  $resultCek['app_ad']; ?>">
                                <a class="blog-overlay text-decoration-none" href="app-etrafli/<?php echo seo($resultCek['app_ad'].'/'.$resultCek['app_id']) ?>">  <?php /* appdetal.php?app_id=<?php echo $resultCek['app_id']; ?> */ ?>
                                    <h5 class="text-white mb-3"><?php echo $resultCek['app_ad']; ?></h5>
                                    
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
                    <!-- <div class="col-12">
                            <hr>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-lg justify-content-center mb-0">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </div> -->
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Blog End -->


<?php include 'footer.php' ?>