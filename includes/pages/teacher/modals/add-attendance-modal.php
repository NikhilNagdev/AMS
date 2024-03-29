<div class="modal animated" id="add-attendance-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Please Select Details</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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