<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 9/4/2019
 * Time: 9:32 PM
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/core/CRUD.class.php";


class Teacher{

    function __construct()
    {
        $this->user = CRUD::table("teacher");
    }



    private $user;
}