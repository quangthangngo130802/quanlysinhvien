<?php 


    function check_login($username, $password){
        $check  = db_num_rows("Select * from `tbl_student_account` where `student_code` = '{$username}' and `password` = '{$password}' ");
        if($check > 0){
            return true;   
        }
        return false; 
    }

    function get_student($code){
        $result = db_fetch_row("Select * from `tbl_student_account` where `student_code` = '{$code}' ");
        return $result;
    }

    function course($id){
        $result = db_fetch_row("Select * from `tbl_course` where `course_id` = '{$id}' ");
        return $result;
    }
    

?>