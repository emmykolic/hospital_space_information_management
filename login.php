<?php include_once("config.php"); ?>
<?php include_once("header.php"); ?>
<div class="main">
  <section class="module bg-dark-60 about-page-header" data-background="assets/images/about_bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Login</h2>
          <div class="module-subtitle font-serif">enter your login credentials</div>
        </div>
      </div>
    </div>
  </section>
  <section class="module" style="min-height: 60vh;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <?php $project->get_alert(); ?>
          <form role="form" method="post" action="login_action.php">


            <div class="form-group">
              <label class="sr-only" for="mat_no">Matriculation Number or email</label>
              <input class="form-control" type="text" id="mat_no" name="mat_no" placeholder="Your Matriculation Number*" required="required" data-validation-required-message="Please enter your Matriculation Number." />
              <p class="help-block text-danger"></p>
            </div>

            <div class="form-group">
              <label class="sr-only" for="password">Password</label>
              <input class="form-control" type="password" id="password" name="password" placeholder="Your password" required="required" data-validation-required-message="Please enter your password." />
              <p class="help-block text-danger"></p>
            </div>

            <div class="text-center">
              <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Login</button>
            </div>
          </form>
          <div class="ajax-response font-alt" id="contactFormResponse"></div>
        </div>
      </div>
    </div>
  </section>


  <?php include_once("footer.php"); ?>