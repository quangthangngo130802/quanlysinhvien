<?php 


    function check_login($username, $password){
        $check  = db_num_rows("Select * from `tbl_admin` where `username` = '{$username}' and `password` = '{$password}' ");
        if($check > 0){
            return true;   
        }
        return false; 
    }
    function get_department($username,$password){
        $result = db_fetch_row("Select * from `tbl_admin` where `username` = '{$username}' and `password` = '{$password}'");
        return $result;
    }

?>