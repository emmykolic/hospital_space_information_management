<?php include_once("config.php"); ?>
<?php include_once("header.php"); ?>
<div class="main">
    <section class="module bg-dark-60 about-page-header" data-background="assets/images/about_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Register Industry Supervisor</h2>
                    <div class="module-subtitle font-serif">fill the form below to create a industry supervisor account.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <?php $project->get_alert(); ?>
                    <form role="form" method="post" action="add_company_action.php">
                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <input class="form-control" type="text" id="name" name="fullname" placeholder="Your Full Name*" required="required" data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="mat_no">ID</label>
                            <input class="form-control" type="text" id="mat_no" name="mat_no" placeholder="Staff ID*" required="required" data-validation-required-message="Please enteStaff ID." />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Your password" required="required" data-validation-required-message="Please enter your password." />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="cpassword">Confirm Password</label>
                            <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Confirm Your password" required="required" data-validation-required-message="Please confirm your password." />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Register supervisor</button>
                        </div>
                    </form>
                    <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once("footer.php"); ?>