<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 10/8/2019
 * Time: 8:04 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Attendance{

    function __construct(){
        $this->attendace = CRUD::table("attendance");
    }

    public function insertAttendance($student_id, $teacher_id, $subject_id, $datetime, $status, $batch_id, $class_id){
        $this->attendace->insert(array("student_id"=>$student_id, "teacher_id"=>$teacher_id, "subject_id"=>$subject_id, "dt"=>$datetime, "status"=>$status, "class_id"=>$class_id, "batch_id"=>$batch_id));
    }

    private $attendace;

}