<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 10/8/2019
 * Time: 10:47 PM
 */

require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Batch{

    function __construct()
    {
        $this->batch = CRUD::table("batch");
    }



    public function getBatchByStudentAndClass($student_id, $class_id){
        //SELECT * FROM student_details JOIN batch ON batch.batch_id = student_details.batch_id JOIN class ON class.class_id = batch.class_id WHERE student_details.student_id = 18 AND class.class_id = 1

        return CRUD::table("student_details")
            ->select("student_details.batch_id")
            ->join("batch", "batch.batch_id", "student_details.batch_id")
            ->join("class", "class.class_id", "batch.class_id")
            ->where("student_details.student_id", $student_id)
            ->andWhere("class.class_id", $class_id)
            ->get()
            ->fetch();
    }

    private $batch;
}