<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  
    Document Title
    =============================================
    -->
  <title><?= $project->site_name ?></title>


  <!-- Default stylesheets-->
  <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Template specific stylesheets-->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
  <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
  <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
  <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
  <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
  <!-- Main stylesheet and color file-->
  <link href="assets/css/style.css" rel="stylesheet">
  <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
  <main>
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"><?= $project->site_name ?></a>
        </div>
        <div class="collapse navbar-collapse" id="custom-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a> </li>
            <?php if (isset($project->uid)) : ?>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><?= ucwords($project->fullname) ?></a>
                <ul class="dropdown-menu">
                  <li><a href="home.php">My Account</a></li>
                  <?php if($project->type == 7): ?>
                  <li><a href="create_departments.php">Create Departments</a></li>
                  <?php endif; ?>
                  <?php if($project->type == 9): ?>
                  <li><a href="create_equipments.php">Create Equipments</a></li>
                  <?php endif; ?>
                  
                  <li><a href="logout.php">logout</a></li>
                </ul>
              </li>
            <?php else : ?>
              <li class="nav-item"><a class="nav-link" href="login.php">Login</a> </li>
              <li class="nav-item"><a class="nav-link" href="register.php">Register</a> </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>