<?php

function get_list_teacher() {
    $result = db_fetch_array("SELECT * FROM `tbl_teacher`");
    return $result;
}
function get_teacher_by_id($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_teacher` Where `teacher_id` = '{$id}' ");
    return $result;
}

function phantrang_teacher($start, $number_page){
    $result =db_fetch_array( "SELECT * FROM `tbl_teacher` LIMIT $start, $number_page");
    return $result;
}

function faculty_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_faculty` where  `faculty_id` = '{$id}'");
    return $result;
}

function list_chucvu(){
    $result = db_fetch_array("SELECT * FROM `tbl_chucvu` ");
    return $result;
}

function chucu_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_chucvu` where  `chucvu_id` = '{$id}'");
    return $result;
}


function check_code_email($email){
    $result = db_num_rows( "SELECT * FROM `tbl_teacher` where `email` = '{$email}' ");
    return $result;
}


function list_faculty(){
    $result = db_fetch_array("SELECT * FROM `tbl_faculty`");
    return $result;
}
function list_education(){
    $result = db_fetch_array("SELECT * FROM `tbl_education`");
    return $result;
}
function education($id){
    $result = db_fetch_row("SELECT * FROM `tbl_education` where `education_id` = '{$id}' ");
    return $result;
}


function search_teacher($name){
    $result = db_fetch_array(" SELECT * FROM `tbl_teacher` WHERE `teacher_name` LIKE '%{$name}%' ");
    return $result;
   
}

function phantrang_search_teacher($start, $number_page, $name){
    $result = db_fetch_array( "SELECT * FROM `tbl_teacher` Where `teacher_name` LIKE '%{$name}%' LIMIT $start, $number_page");
    return $result;
}




