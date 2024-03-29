<div class="modal animated" id="view-attendance-modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Please Select Details to View
                    Attendance</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?src=view-attendance" method="post">


                    <div class="table-responsive">
                        <table id="view-attendance" class="display table table-striped table-hover"
                               style="width: 100%">
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Class Name</th>
                                <th>Subject</th>
                                <th>Date And Time</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <input type="text" name="subject_name" hidden>
                            <input type="text" name="class_name" hidden>
                            <input type="text" name="start_dt" hidden>
                            <tbody class="student-data">
                            <?php
                            $attendances = $attendanceObj->getAttendanceByTeacherAndSubject(1);
                            $index = 0;
                            $countTotal = sizeof($attendances);
                            if ($countTotal > 0) {
                                foreach ($attendances as $attendance) {
                                    $index++;
                                    echo <<<ATTENDANCE
                                <tr>
                                    <td>{$index}</td>
                                    <td>{$attendance->classname}</td>
                                    <td>{$attendance->subject_name}</td>
                                    <td>{$attendance->dt}</td>
                                    <td><input name = "attendance_id" id="select-class-subject-date" type="radio" value="{}"></td>
                                </tr>
ATTENDANCE;
                                }
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>