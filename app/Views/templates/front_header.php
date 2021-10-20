<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href=" public/assets/img/favicon.png">
    <title><?php echo isset($title) ? $title : ' Soft Website' ; ?></title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/assets/css/owl.theme.default.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" /> -->

    <!-- font awesome icons -->
    <link rel="stylesheet" href="public/assets/css/all.min.css">

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="public/assets/css/style.css">

</head>
<body>

<!-- start #header -->
<header id="header">
    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
   
        <a class="navbar-brand" href="/soft/home"><img class="logo" src="public/assets/img/logo.png">Soft Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item active">
                    <a class="nav-link" href="/soft/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/soft/products">Products <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/soft/blog">Blog <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/soft/contactus">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/soft/customer/login">Login</a>
                </li>
            </ul>
            <form action="#" class="font-size-14 font-rale">
                <a href="/soft/cart" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo $totalItems; ?></span>
                </a>
            </form>
        </div>
    </nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">
<?php
$session = \Config\Services::session();
?>
<?php if (isset($session->success)) : ?>
<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congrate!</strong>
  <?= $session->success ?>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>