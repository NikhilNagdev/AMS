<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 9/4/2019
 * Time: 9:32 PM
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/database/core/CRUD.class.php";


class User{

    function __construct()
    {
        $this->user = CRUD::table("user");
    }

    public function getUser($email){
        return $this->user
            ->join("user_role", "user.user_id", "user_role.user_id")
            ->join("role", "role.role_id", "user_role.role")
            ->where("email", $email)
            ->select("*")
            ->get();
    }




    private $user;
}