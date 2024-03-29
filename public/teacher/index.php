<?php
ob_start();
require_once "../../document_root.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "includes/Helper.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "database/models/Student.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "database/models/Class.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "database/models/Subject.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "database/models/Batch.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "database/models/Attendance.claas.php";

$teacherID = 1;
$helper = new Helper();
$studentObj = new Student();
$classObj = new ClassTable();
$subjectObj = new Subject();
$batchObj = new Batch();
$attendanceObj = new Attendance();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>AMS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Open+Sans:300,400,600,700"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['../../assets/css/fonts.css']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="../../assets/css/azzara.min.css">

    <style>
        tr.highlight {
            background-color: darkgrey !important;
        }
    </style>
</head>
<body>

<div class="wrapper" id="wrapper">
    <div class="main-header" data-background-color="purple">
        <!-- Logo Header -->
        <div class="logo-header">

            <a href="index.php" class="logo">
                <h1 class="navbar-brand text-white">AMS</h1>
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
            <div class="navbar-minimize">
                <button class="btn btn-minimize btn-rounded">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <?php
        require_once "../../includes/navbar.php";
        ?>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "includes/pages/teacher/sidebar.php";
    ?>
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="panel-header bg-dark-gradient" style="background: linear-gradient(-45deg,#0a0b11,#1f283e)">
                <div class="page-inner py-5">
                    <div class="d-flex flex-column flex-md-row">
                        <div>
                        </div>
                        <div class="text-white" style="margin-right: auto">
                            <?php
                            if (isset($_GET['src'])) {
                                $title = $_GET['src'];
                                echo "<h2 class=\"\"><span class=\"page-title text-white\">" . Helper::getPageHeading($title) . "</span></h2>";
                            } else {
                                echo "<h2 class=\"\"><span class=\"page-title text-white\">Dashboard</span></h2>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--MAIN PAGE CONTENT-->
            <?php
                if(isset($_GET['src'])){
                    $page = $_GET['src'];
                    switch ($page){
                        case 'add-attendance':
                            require_once "attendance/add-attendance.php";
                            break;
                        case 'add-student':
                            require_once "student/add-students.php";
                            break;
                        case 'view-attendance':
                            require_once "attendance/view-all-attendance.php";
                            break;
                        case 'view-all-students':
                            require_once "student/view-all-students.php";
                            break;
                        case 'view-all-reports':
                            require_once "report/view-all-reports.php";
                            break;
                        default:
                            require_once "../../includes/pages/teacher/dashboard.php";
                    }
                }else{
                    require_once "../../includes/pages/teacher/dashboard.php";
                }
            ?>
            <!--END OF MAIN PAGE CONTENT-->
        </div>
    </div>
</div>


<!--   Core JS Files   -->
<?php
    require_once "../../includes/pages/teacher/modals/select-class.php";
    require_once "../../includes/pages/teacher/modals/add-attendance-modal.php";
    require_once "../../includes/pages/teacher/modals/view-attendance-modal.php";
    require_once "../../includes/pages/teacher/modals/view-report-modal.php";
    require_once "../../includes/core-scripts.php";
require_once "../../includes/pages/teacher/modals/select-class.php";
require_once "../../includes/pages/teacher/modals/add-attendance-modal.php";
require_once "../../includes/pages/teacher/modals/view-attendance-modal.php";
require_once "../../includes/core-scripts.php";

$attendanceCount = $attendanceObj->getLatestAttendance(1, 4);
$i = 0;
$status = array();
foreach ($attendanceCount as $c){
    $status[] = $c->status;
}
    for($i=0; $i<count($status); $i+=2){
        echo $status[$i];
        $temp = $i+1;
        $temp2 = $i+2;
        $tempi = $i+1;
        echo <<<SCRIPT
        <script>var doughnutChart$temp = document.getElementById('doughnutChart{$temp}').getContext('2d');
            var myDoughnutChart$temp = new Chart(doughnutChart$temp, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [$status[$i], $status[$tempi]],
                        backgroundColor: ['#1d7af3', '#f3545d']
                    }],
    
                    labels: [
                        'Present',
                        'Absent'
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend : {
                        position: 'bottom'
                    },
                    layout: {
                        padding: {
                            left: 20,
                            right: 20,
                            top: 20,
                            bottom: 20
                        }
                    }
                }
            });
            </script>
            
SCRIPT;
    }


?>
<script src="../../assets/js/teacher-script.js"></script>
<script>
    $('table#view-overall-attendance').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
</body>
</html>
