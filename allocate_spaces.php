<?php
include("config.php");
$project->bouncer_manager();
$sid = $project->db->query("SELECT sid FROM spaces");
$sid = $sid->fetch_assoc();
include("header.php");
?>
<div class="main container">
    <div class="row m-5">
        <div class="col-sm-12">
            <h2 class="mt-5 text-center">Allocate Spaces</h2>
            <?php
            //$sid = $project->db->query($sid); // Sanitize the input
            $lists = $project->db->query("SELECT * FROM spaces "); //WHERE sid = '$sid'
            $unallocted = $project->db->query("SELECT * FROM spaces "); //WHERE sid='$sid'
            $unallocted = $unallocted->num_rows;
            // print_r($unallocted);
            
            if ($lists->num_rows > 0) :?>
                <?php if ($unallocted == 0) : ?>
                    <div class="alert alert-warning">You have <?= $unallocted ?> unallocated spaces. Please allocate.</div>
                <?php else : ?>
                    <div class="alert alert-success">You have allocated all your spaces. Well done!</div>
                <?php endif; ?>
                <table class="table table-striped table-border checkout-table table-responsive">
                    <tbody>
                        <?php while ($row = $lists->fetch_assoc()) : ?>
                            <tr>
                                <td><b>Ward: <?= $row['ward_number'] ?>, Has <?= $row['bed_ward_by_ward'] ?> Beds</b> <br>
                                <?= $project->status ?> <a href="add_to_departments.php?sid=<?= $row['sid'] ?>" class="text-white badge bg-success badge-pills"><i class="fa fa-wrench"></i> Allocate to Departments</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-warning">You Have No Spaces To Allocate</div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include("footer.php"); ?>