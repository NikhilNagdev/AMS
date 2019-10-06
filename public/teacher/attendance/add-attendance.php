<div class="page-inner" style="margin-top: -80px;">
    <div class="page-header">
        <h4 class="page-title text-white"></h4>
    </div>
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <h2>Enter Attendance Here</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sr no</th>
                                <th>Roll no</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['class_id'])){
                                $i = 0;
                                $students = $studentObj->getStudentsByClass($_POST['class_id']);
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
                                                <td class="text-center">
                                                    <form action="">
                                                        <input type="hidden" name="student_id" value={$student->student_id}>
                                                    </form>
                                                    <a href="" role="button" class="btn btn-primary"><i class="fa fa-2x fa-eye"></i></a>
                                                </td>
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