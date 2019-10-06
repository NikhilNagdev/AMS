<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 6/18/2019
 * Time: 8:04 PM
 */


require_once $_SERVER['DOCUMENT_ROOT']."/database/core/CRUD.class.php";

class Subject{

    function __construct(){
        $this->subjectObj = CRUD::table("subject");
    }


    public function getSubjectsBySemAndBranch($semNo, $branch_id){

        return $this->subjectObj->select("subject_name", "subject_id")
            ->join("branch", "subject.branch_id", "branch.branch_id")
            ->where("subject.branch_id", $branch_id)
            ->andWhere("subject.sem_no", $semNo)
            ->get()
            ->fetchAll();

//        SELECT
//    subject_name
//FROM
//    `subject`
//JOIN branch ON
//    subject.branch_id = branch.branch_id
//WHERE
//    subject.branch_id = 1 AND SUBJECT.sem_no = 4


    }

    public function getSubjectIdByTeacher($teacher_id){
//        SELECT * FROM subject JOIN teaches ON teaches.subject_id = subject.subject_id WHERE teaches.teacher_id = 2 AND teaches.is_teaching = 0 GROUP BY subject.subject_id

        return $this->subjectObj->select("subject.subject_id as id", "subject.subject_name")
            ->join("teaches", "teaches.subject_id", "subject.subject_id")
            ->where("teaches.teacher_id", $teacher_id)
            ->andWhere("teaches.is_teaching", 0)
            ->andWhere("subject.deleted", 0)
            ->groupBy("subject.subject_id")
            ->get()
            ->fetchAll();

    }

    public function getSubjectByTeacherAndBatch($teacher_id, $batch_id){
        //SELECT * FROM subject JOIN teaches ON teaches.subject_id = subject.subject_id JOIN batch ON batch.batch_id = teaches.batch_id JOIN class ON batch.class_id = class.class_id  WHERE teaches.teacher_id = 2 AND batch.batch_id = 3 AND teaches.is_teaching = 0 GROUP BY subject.subject_id

        return $this->subjectObj->select("subject.subject_id", "subject.subject_name")
            ->join("teaches", "teaches.subject_id", "subject.subject_id")
            ->join("batch", "batch.batch_id", "teaches.batch_id")
            ->join("class", "batch.class_id", "class.class_id")
            ->where("teaches.teacher_id", $teacher_id)
            ->andWhere("batch.batch_id", $batch_id)
            ->andWhere("teaches.is_teaching", 0)
            ->andWhere("subject.deleted", 0)
            ->groupBy("subject.subject_id")
            ->get()
            ->fetchAll();
    }

    public function getSubjectByTeacherAndClass($teacher_id, $class_id){
//        SELECT * FROM subject JOIN teaches on teaches.subject_id = subject.subject_id JOIN batch on teaches.batch_id = batch.batch_id JOIN class on batch.class_id = class.class_id WHERE teaches.teacher_id = 1 AND class.class_id = 1 GROUP BY subject.subject_id

        return $this->subjectObj->select("subject.subject_id" ,"subject.subject_name")
            ->join("teacher", "teaches.subject_id", "subject.subject_id")
            ->join("batch", "teaches.batch_id", "batch.batch_id")
            ->join("class", "batch.class_id", "class.class_id")
            ->where("teaches.teacher_id", $teacher_id)
            ->andWhere("class.class_id", $class_id)
            ->groupBy("subject.subject_id")
            ->get()
            ->fetchAll();
    }

    private $subjectObj;

}
