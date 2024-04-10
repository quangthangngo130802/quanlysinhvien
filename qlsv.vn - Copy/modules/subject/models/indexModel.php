<?php

function get_list_subject() {
    $result = db_fetch_array("SELECT * FROM `tbl_subject`");
    return $result;
}
function get_list_faculty() {
    $result = db_fetch_array("SELECT * FROM `tbl_faculty`");
    return $result;
}



function subject_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_subject` where `subject_id` = '{$id}'");
    return $result;
}



function get_list_major(){
    $result =db_fetch_array("SELECT * FROM `tbl_major` ");
    return $result;
}

function major_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_major` where `major_id` = '{$id}' ");
    return $result;
}

function get_list_teacher(){
    $result =db_fetch_array("SELECT * FROM `tbl_teacher` ");
    return $result;
}

function teacher_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_teacher` where `teacher_id` = '{$id}' ");
    return $result;
}

function get_list_semester(){
    $result =db_fetch_array("SELECT * FROM `tbl_semester` ");
    return $result;
}

function semester_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_semester` where `semester_id` = '{$id}' ");
    return $result;
}


function phantrang_subject($start, $number_page){
    $result =db_fetch_array( "SELECT * FROM `tbl_subject` LIMIT $start, $number_page");
    return $result;
}

function major_name_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_major` where `major_id` = '{$id}' ");
    return $result;
}

function semester_name_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_semester` where `semester_id` = '{$id}' ");
    return $result;
}

function teacher_name_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_teacher` where `teacher_id` = '{$id}' ");
    return $result;
}
