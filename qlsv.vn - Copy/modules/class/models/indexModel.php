<?php

function get_list_class() {
    $result = db_fetch_array("SELECT * FROM `tbl_class`");
    return $result;
}

function number_teacher_by($id) {
    $result = db_num_rows("SELECT * FROM `tbl_class` where `teacher_id` = '{$id}'");
    return $result;
}


function class_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_class` where `class_id` = '{$id}' ");
    return $result;
}


function get_list_faculty() {
    $result = db_fetch_array("SELECT * FROM `tbl_faculty`");
    return $result;
}

function get_list_couse(){
    $result =db_fetch_array("SELECT * FROM `tbl_course` ");
    return $result;
}

function get_list_teacher(){
    $result =db_fetch_array("SELECT * FROM `tbl_teacher` ");
    return $result;
}

function phantrang_class($start, $number_page){
    $result =db_fetch_array( "SELECT * FROM `tbl_class` LIMIT $start, $number_page");
    return $result;
}

function course_name_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_course` where `course_id` = '{$id}' ");
    return $result;
}

function faculty_name_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_faculty` where `faculty_id` = '{$id}' ");
    return $result;
}

function teacher_name_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_teacher` where `teacher_id` = '{$id}' ");
    return $result;
}

function teacher_name_by_faculty($id){
    $result =db_fetch_array("SELECT * FROM `tbl_teacher` where `faculty_id` = '{$id}' ");
    return $result;
}
