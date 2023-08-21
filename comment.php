<?php include_once("config.php");
$project->bouncer_editor();
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
} else {
    $project->set_alert("warning", "student not Found");
    die(header("Location: home.php"));
}

?>
<?php include_once("header.php"); ?>
<div class="main">

    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Add weekly comment</h2>
                    <?php $project->get_alert(); ?>
                    <form role="form" method="post" action="comment_action.php">
                        <input type="hidden" name="student" value="<?= $uid ?>">
                        <div class="form-group">
                            <label class="sr-only" for="week">Week</label>
                            <select class="form-control" id="week" name="week" required="required" data-validation-required-message="Please enter your entry week.">
                                <option value="">Select Week</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                            </select>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="comment" required="required" data-validation-required-message="Please enter your Activity for the day."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Add Comment</button>
                        </div>
                    </form>
                    <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
            </div>
        </div>
    </section>


    <?php include_once("footer.php"); ?>