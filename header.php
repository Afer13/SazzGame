<?php include 'function.php'; ?>
<base href="http://localhost/sazzgame/">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SAZZAPP</title>
    <link rel="icon" type="image/x-icon" href="img/titleicon/s.ico">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="SAZZAPP" name="keywords">
    <meta content="SAZZAPP" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="anasehife" class="text-decoration-none">
                    <h1 class="m-0"><span class="text-primary">SAZZ</span>APP</h1>
                </a>
            </div>
            
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">E-Mail</h6>
                        <small>aferrehimov@gmail.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Tel</h6>
                        <small>+99455 764 71 65</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                
                    <div class="text-left">
                    <h5 class="m-0">@afer<span class="text-primary">_13_</span>rehimov</h5>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span >SAZZ</span>GAMES</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div style="margin:auto;" class="navbar-nav py-0">
                            <a href="anasehife" id="anasehife" class="nav-item nav-link"><i class="fa fa-home" aria-hidden="true"></i> Ana Səhifə</a>
                            <a href="oyunlar" id="oyun" class="nav-item nav-link "><i class="fa fa-gamepad" aria-hidden="true"></i> Oyunlar</a>
                            <a href="proqramlar" id="proqram" class="nav-item nav-link"><i class="fa fa-server" aria-hidden="true"></i> Proqramlar</a>
                            <a href="haqqimizda" id="haqqimizda" class="nav-item nav-link"><i class="fa fa-book" aria-hidden="true"></i> Haqqımızda</a>
                        </div>
                        
                    </div>
                    
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <script>
        <?php if($_GET['menu_ad']){ ?>
            document.querySelector('#<?php echo $_GET['menu_ad']; ?>').className+=" active";
            <?php } ?>
    </script>