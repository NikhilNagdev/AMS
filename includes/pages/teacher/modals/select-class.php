<div class="modal animated" id="select-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Select class</h5>
                <button type="button" class="close" data-custom-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?src=view-all-students" method="post">
                    <select name="class_id" id="class-id" class="form-control">
                        <?php
                            $classes = $classObj->getClassByTeacher($teacherID);
                            echo "<option value=\"0\" selected disabled>Select here</option>";
                            foreach ($classes as $class){
                                echo "<option value=$class->class_id>$class->classname</option>";
                            }
                        ?>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-custom-dismiss="modal">Close</button>
                        <button id="" class=" btn btn-primary" type="submit">Proceed</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>