<div class="modal animated" id="view-attendance-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Please Select Details to View Attendance</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="teacher-attendance" class="display table table-striped table-hover"
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
                        <tbody class="student-data">
                        <?php
                        $attendances = $attendanceObj->getAttendanceByTeacherAndSubject(1);
                        $index = 0;
                        $countTotal = sizeof($attendances);
                        if($countTotal > 0){
                            foreach ($attendances as $attendance) {
                                $index++;
                                echo <<<ATTENDANCE
                                <tr>
                                    <td>{$index}</td>
                                    <td>{$attendance->classname}</td>
                                    <td>{$attendance->subject_name}</td>
                                    <td>{$attendance->dt}</td>
                                    <td><input name = "attendance_id" id="select-class-subject-date" type="checkbox" value="{}"></td>
                                </tr>
ATTENDANCE;
                            }
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
                <form action="index.php?src=add-attendance" method="post">
                    <div class="form-group">
                        <label for="date-time">Enter date and time of lecture</label>
                        <input class="datetime form-control" type='text' name="start_dt" required placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="">Select Class</label>
                        <select name="class_id" id="class-id" class="form-control">
                            <?php
                            $classes = $classObj->getClassByTeacher($teacherID);
                            echo "<option value=\"0\" selected disabled>Select here</option>";
                            foreach ($classes as $class){
                                echo "<option value=$class->class_id>$class->classname</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Select Subject</label>
                        <select name="subject_id" id="class-id" class="form-control">
                            <?php
                            $subjects = $subjectObj->getSubjectIdByTeacher($teacherID);
                            echo "<option value=\"0\" selected disabled>Select here</option>";
                            foreach ($subjects as $subject){
                                echo "<option value=$subject->id>$subject->subject_name</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-custom-dismiss="modal">Close</button>
                        <button id="" class=" btn btn-primary" type="submit">Proceed</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>