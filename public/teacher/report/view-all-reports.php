<div class="page-inner" style="margin-top: -80px;">
    <div class="page-header">
        <h4 class="page-title text-white"></h4>
    </div>
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <h2>Attendance Report</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="view-overall-attendance" class="display table table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Roll no</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Batch</th>
                                <th>Sem</th>
                                <th>Percentage</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_POST['view_report'])){
                                        $i = 0;
                                        $students = $attendanceObj->getAttendanceInPercentage($_POST['class_id'], $_POST['subject_id'], 1);
                                        foreach ($students as $student){
                                            $i++;
                                            echo<<<TABLEDATA
                                            <tr>
                                                <td>{$i}</td>
                                                <td>{$student->student_id}</td>
                                                <td>{$student->name}</td>
                                                <td>{$student->classname}</td>
                                                <td>{$student->batch_name}</td>
                                                <td>{$student->sem_no}</td>
                                                <td>{$student->percent}</td>
                                            </tr>
TABLEDATA;
                                        }
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