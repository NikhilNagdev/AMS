<div class="modal animated" id="view-report-modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalCenterTitle">Please Select Details to View
                    Report</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?src=view-all-reports" method="post">
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Enter Start Date</label>
                                <input type="date" class="form-control" id="doj" name="doj">
                            </div>
                            <div class="col-md-6">
                                <label for="">Enter End Date</label>
                                <input type="date" id="dob" class="form-control" name="dob" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" name="view_report">Proceed</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>