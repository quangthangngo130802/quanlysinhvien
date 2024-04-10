<?php

function get_list_faculty() {
    $result = db_fetch_array("SELECT * FROM `tbl_faculty`");
    return $result;
}

function phantrang_faculty($start, $number_page){
    $result =db_fetch_array( "SELECT * FROM `tbl_faculty` LIMIT $start, $number_page");
    return $result;
}

function faculty_by_id($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_faculty` where `faculty_id` = '{$id}' ");
    return $result;
}

