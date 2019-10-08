<?php
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['submit'])){
        $studentdIds = $_POST['studentIds'];
        $firstId = $_POST['first_student_id'];
        $total = $_POST['total'];
        $start_dt = $_POST['start_dt'];
        $subject_id = $_POST['subject_id'];
        $class_id = $_POST['class_id'];
        $status = array();
        for($i = $firstId; $i<=$total; $i++){

            $batch_id = $batchObj->getBatchByStudentAndClass($i, $class_id)->batch_id;
            if(in_array($i, $studentdIds)){
                $status[$i] = 1;
                $attendanceObj->insertAttendance($i, 1, $subject_id, $start_dt, 1, $batch_id, $class_id);
            }else {
                $attendanceObj->insertAttendance($i, 1, $subject_id, $start_dt, 0, $batch_id, $class_id);
                $status[$i] = 0;
            }
        }
        header("Location: http://localhost/AMS/public/teacher/index.php?src=view-all-attendance");
//        print_r($status);
}
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
                    <form action="index.php?src=add-attendance" method="post">
                        <div class="table-responsive">
                            <table id="add-attendance-table" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Roll No</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Batch</th>
                                    <th width="10%">Action
                                        <label>
                                            <input class="select-all-students-ids pull-right" type="checkbox" checked>
                                        </label>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--                            <input type="checkbox" class="student-id" name="student-id" value="{$student->student_id}">-->
                                <!--<input name="student-id" id="student-id" type="checkbox" checked data-toggle="toggle" data-on="Present" data-off="Absent" data-onstyle="success" data-offstyle="danger">-->
                                <?php
                                if(isset($_POST['class_id'])){

                                    $i = 0;
                                    $students = $studentObj->getStudentsByClass($_POST['class_id']);
                                    $count = sizeof($students)." "." fjskdfjhs";
                                    $start_dt = str_replace(' ', '/', $_POST['start_dt']);;
                                    $subject_id = $_POST['subject_id'];
                                    $class_id = $_POST['class_id'];
                                    echo "<input name=subject_id type=text value=$subject_id>";
                                    echo "<input name=class_id type=text value=$class_id>";
                                    echo "<input name=total type=text value=$count>";
                                    echo "<input name=start_dt type=datetime value=$start_dt>";
                                    foreach ($students as $student){
                                        if($i == 0){
                                            echo "<input name=first_student_id type=text hidden  value=$student->student_id>";
                                        }
                                        $i++;
                                        echo<<<TABLEDATA
                                            <tr>
                                                <td>{$i}</td>
                                                <td>{$student->student_id}</td>
                                                <td>{$student->name}</td>
                                                <td>{$student->batch_name}</td>
                                                <td class="text-center">
                                                        <input id="student-id" type="checkbox" value="$student->student_id" checked data-toggle="toggle" data-on="Present" data-off="Absent" data-onstyle="success" data-offstyle="danger">
                                                        <input type="checkbox" hidden value="{$student->student_id}">
                                                </td> 
                                            </tr>
<input type="checkbox" hidden name="studentIds[]" value="$student->student_id" checked class="student-id">
TABLEDATA;
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Proceed</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>