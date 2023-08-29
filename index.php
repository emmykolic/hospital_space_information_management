<?php include_once("config.php"); ?>
<?php include_once("header.php"); ?>
<div class="main">
  <section class="module bg-dark-60 about-page-header" data-background="assets/images/nurse.jpg">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt"><?= $project->site_name ?></h2>
          <div class="module-subtitle font-serif">Development of virtual logbook system.</div>
        </div>
      </div>
    </div>
  </section>

  <section class="module mt-5" id="services" style="min-height:60vh;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Site Applications</h2>
          <div class="module-subtitle font-serif"></div>
        </div>
      </div>
      <div class="row multi-columns-row">
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Create Account</h3>
            <p>Create Accounts for Users, Supervisors and Admins</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Hospital Space Management</h3>
            <p>Hospital space Management will department manager, system administrator, clinical staff,  interfaces</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">comments</h3>
            <p>Industry supervisor and can comment their allocated students</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Create Account</h3>
            <p>Create Accounts for students and supervisors</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Log Book</h3>
            <p>Students can enter daily log book activities</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">comments</h3>
            <p>Industry supervisor and can comment their allocated students</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include_once("footer.php"); ?>