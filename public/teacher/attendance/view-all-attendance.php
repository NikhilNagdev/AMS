<?php
//print_r($_POST);
?>
<div class="page-inner" style="margin-top: -80px;">
    <div class="page-header">
        <h4 class="page-title text-white"></h4>
    </div>
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <!--                <div class="card-header">-->
                <!--                    <div class="card-head-row">-->
                <!--                        <h2>Enter Attendance Here</h2>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="view-student-attendance" class="display table table-striped table-hover" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Roll No</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Subject</th>
                                <th>Date Time</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 0;
                                $attendances = $attendanceObj->getAttendanceByClassAndTimeAndSubject($_POST['class_name'], $_POST['subject_name'], $_POST['start_dt']);
                                foreach ($attendances as $attendance) {
                                    $i++;
                                    if($attendance->status == 1){
                                        $att = "Present";
                                        $cssClass = "";
                                    }else{
                                        $att = "Absent";
                                        $cssClass = "highlight";
                                    }
                                    echo <<<TABLEDATA
                                            <tr class="$cssClass">
                                                <td>{$i}</td>
                                                <td>{$attendance->student_id}</td>
                                                <td>{$attendance->name}</td>
                                                <td>{$attendance->subject_name}</td>
                                                <td>{$attendance->dt}</td>
                                                <td>{$att}</td> 
                                            </tr>
TABLEDATA;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>