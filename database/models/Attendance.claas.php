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
        $this->attendance = CRUD::table("attendance");
    }

    public function getAttendanceByTeacherAndSubject($teacher_id){
//        SELECT * FROM `teaches` JOIN batch ON batch.batch_id = teaches.batch_id JOIN class ON class.class_id = batch.class_id JOIN ON attendance attendance.subject_id = subject.subject_id WHERE teaches.teacher_id = 1 GROUP BY teaches.subject_id

        return CRUD::table("teaches")
            ->select("*")
            ->join("batch", "batch.batch_id", "teaches.batch_id")
            ->join("class",  "class.class_id", "batch.class_id")
            ->join("subject", "subject.subject_id", "teaches.subject_id")
            ->join("attendance", "attendance.subject_id", "subject.subject_id")
            ->where("teaches.teacher_id", $teacher_id)
            ->andWhere("teaches.teacher_id", $teacher_id)
            ->groupBy("attendance.dt")
            ->get()
            ->fetchAll();
    }

    public function insertAttendance($student_id, $teacher_id, $subject_id, $datetime, $status, $batch_id, $class_id){
        $this->attendance->insert(array("student_id"=>$student_id, "teacher_id"=>$teacher_id, "subject_id"=>$subject_id, "dt"=>$datetime, "status"=>$status, "class_id"=>$class_id, "batch_id"=>$batch_id));
    }

    private $attendance;

}