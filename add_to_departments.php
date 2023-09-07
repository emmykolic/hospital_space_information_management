<?php include_once("config.php");
$project->bouncer_manager();
$uid = $project->uid;
if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    $lists = $project->db->query("SELECT * FROM departments ");
    if ($lists->num_rows < 1) {
        $project->set_alert("success", "There are no students to allocate <br>");
        die(header("Location: home.php"));
    }
} else {
    $project->set_alert("success", "Staff not Found");
    die(header("Location: home.php"));
}

?>
<?php include_once("header.php"); ?>
<div class="main">

    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Allocate Ward To Departments</h2>
                    <?php $project->get_alert(); ?>
                    <form role="form" method="post" action="add_to_departments_action.php">
                        <input type="hidden" name="facilitator" value="<?= $sid ?>">
                        <div class="form-group">
                            <label class="sr-only" for="departments">Departments</label>
                            <select class="form-control" id="departments" name="departments" required="required" data-validation-required-message="Please enter your entry departments.">
                                <option value="">Select Departments</option>
                                <?php while ($row = $lists->fetch_assoc()) : ?>
                                    <option><?= ucwords($row['name_of_department']) ?></option>
                                <?php endwhile; ?>
                            </select>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Allocate</button>
                        </div>
                    </form>
                    <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once("footer.php"); ?>