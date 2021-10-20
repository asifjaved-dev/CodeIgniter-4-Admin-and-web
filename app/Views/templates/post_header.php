<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href=" ../public/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href=" ../public/assets/img/favicon.png">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../public/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../public/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../public/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href=" ../public/assets/css/soft-ui-dashboard.css?v=1.0.2" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title><?php echo isset($title) ? $title : ' Soft CI' ; ?></title>
</head>
<body class="g-sidenav-show   bg-white">
  <?php
    $uri = service('uri');
  ?>
    <?php if (session()->get('isLoggedIn')): ?>
        
      <?php else: ?>
  
  <?php endif; ?>
  