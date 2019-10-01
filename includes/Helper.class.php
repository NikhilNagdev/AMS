<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 10/2/2019
 * Time: 3:43 AM
 */

class Helper{

    public static function getPageHeading($text){
        if(strcasecmp($text, "add-attendance") == 0){
            return "Add Attendance";
        }
    }

}