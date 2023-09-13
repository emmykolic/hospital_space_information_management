<?php
session_start();
DEFINE('DBHOST', 'localhost');
DEFINE('DBUSR', 'root');
DEFINE('DBPASS', '');
DEFINE('DB', 'hospital_space_management_system');

class project
{
    public $db;
    public $site_name;

    public function __construct($name)
    {
        $this->db = new mysqli(DBHOST, DBUSR, DBPASS, DB);
        $this->site_name = $name;
    }


    public function post($index)
    {
        if (isset($_POST[$index])) {
            $index = $_POST[$index];
            $index = strip_tags(trim($index));
            $index = mysqli_real_escape_string($this->db, $index);
            return $index;
        } else {
            return "";
        }
    }

    public function set_alert($type, $msg)
    {
        $_SESSION['alert_type'] = $type;
        $_SESSION['alert_msg'] = $msg;
    }

    public function get_alert()
    {
        if (isset($_SESSION['alert_msg']) && $_SESSION['alert_msg'] != "") {
?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-<?= $_SESSION['alert_type'] ?>"><?= $_SESSION['alert_msg'] ?></div>
                </div>
            </div>
<?php
            $_SESSION['alert_type'] = "";
            $_SESSION['alert_msg'] = "";
        }
    }

    public function bouncer()
    {
        if (isset($_SESSION['auth'])) {
            $auth = $_SESSION['auth'];
            $user = $this->db->query("SELECT * FROM  users WHERE  email='$auth' ");
            if ($user->num_rows > 0) {
                $user = $user->fetch_assoc();
                foreach ($user as $key => $value) {
                    $this->{$key} = $value;
                }
            } else {
                die(header("Location:login.php"));
            }
        } else {
            die(header("Location:login.php"));
        }
    }

    public function bouncer_admin()
    {
        if (isset($_SESSION['auth'])) {
            $auth = $_SESSION['auth'];
            $user = $this->db->query("SELECT * FROM  users WHERE  email='$auth' AND type=9  ");
            if ($user->num_rows > 0) {
                $user = $user->fetch_assoc();
                foreach ($user as $key => $value) {
                    $this->{$key} = $value;
                }
            } else {
                die(header("Location:login.php"));
            }
        } else {
            die(header("Location:login.php"));
        }
    }

    public function bouncer_manager()
    {
        if (isset($_SESSION['auth'])) {
            $auth = $_SESSION['auth'];
            $user = $this->db->query("SELECT * FROM  users WHERE  email='$auth' AND type>=7  ");
            if ($user->num_rows > 0) {
                $user = $user->fetch_assoc();
                foreach ($user as $key => $value) {
                    $this->{$key} = $value;
                }
            } else {
                die(header("Location:login.php"));
            }
        } else {
            die(header("Location:login.php"));
        }
    }

    public function bouncer_editor()
    {
        if (isset($_SESSION['auth'])) {
            $auth = $_SESSION['auth'];
            $user = $this->db->query("SELECT * FROM  users WHERE  email='$auth' AND type=1  ");
            if ($user->num_rows > 0) {
                $user = $user->fetch_assoc();
                foreach ($user as $key => $value) {
                    $this->{$key} = $value;
                }
            } else {
                die(header("Location:login.php"));
            }
        } else {
            die(header("Location:login.php"));
        }
    }
}

$project = new project("Hospital Space Management System");

?>