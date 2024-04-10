<?php

function student($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_student` where `student_id` = '{$id}'");
    return $result;
}

function course($id){
    $result = db_fetch_row("Select * from `tbl_course` where `course_id` = '{$id}' ");
    return $result;
}

function faculty($id){
    $result = db_fetch_row("Select * from `tbl_faculty` where `faculty_id` = '{$id}' ");
    return $result;
}

function classs($id){
    $result = db_fetch_row("Select * from `tbl_class` where `class_id` = '{$id}' ");
    return $result;
}

function semester_detail($id){
    
        $result =db_fetch_row("SELECT * FROM `tbl_semester` where `semester_id` = '{$id}' ");
        return $result;
}

function semester($course_id, $faculty_id){
    $result =db_fetch_row("SELECT * FROM `tbl_semester` where `course_id` = '{$course_id}' and `faculty_id` = '{$faculty_id}' and `IsOpenForRegistration` = 1 ");
    return $result;
}


function semester_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_semester` where `semester_id` = '{$id}' ");
    return $result;
}

function major($id){
    $result =db_fetch_array("SELECT * FROM `tbl_major` where `faculty_id` = '{$id}' ");
    return $result;
}



function subject_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_subject` where `subject_id` = '{$id}' ");
    return $result;
} 

function semester_subject($id){
    $result =db_fetch_row("SELECT * FROM `tbl_semester_subject` where `semester_subject_id` = '{$id}' ");
    return $result;
}

function subject_semester($id){
    $result = db_fetch_array("SELECT tbl_subject.*
    FROM tbl_subject 
    JOIN tbl_semester_subject ON tbl_subject.subject_id = tbl_semester_subject.subject_id
    JOIN tbl_semester ON tbl_semester_subject.semester_id = tbl_semester.semester_id
    Where tbl_semester.semester_id = '{$id}' ");
    return $result;
}

function lop_hoc_phan( $id){
    $result =  db_fetch_array("SELECT tbl_class_section.* 
    FROM tbl_class_section 
    JOIN tbl_semester_subject ON tbl_class_section.semester_subject_id = tbl_semester_subject.semester_subject_id 
    JOIN tbl_semester ON tbl_semester_subject.semester_id = tbl_semester.semester_id 
    WHERE tbl_semester_subject.subject_id = '{$id}'");
//tbl_semester.semester_id = $id1 
    return $result;
}

function empty_dangky($student_id, $semester_id){
    $result = db_num_rows("SELECT * FROM `tbl_enrollments` where `student_id` = '{$student_id}' AND `semester_id` = '{$semester_id}' ");
    return $result;
}

function id_enrollment($student_id, $semester_id){
    $result = db_fetch_row("SELECT * FROM `tbl_enrollments` where `student_id` = '{$student_id}' AND `semester_id` = '{$semester_id}' ");
    return $result;
}

function detailenrollment($id, $hk){
    $result = db_fetch_array("SELECT tbl_enrollmentdetail.* 
    FROM tbl_enrollmentdetail 
    JOIN tbl_enrollments ON tbl_enrollmentdetail.enrollment_id = tbl_enrollments.enrollment_id
    JOIN tbl_semester ON tbl_enrollments.semester_id = tbl_semester.semester_id
    WHERE tbl_enrollments.student_id = '{$id}' AND tbl_semester.semester_id = '{$hk}' ");

    return $result;
}

function dem_sl($id){
    $result = db_num_rows("SELECT tbl_enrollmentdetail.* 
    FROM tbl_enrollmentdetail JOIN tbl_class_section ON tbl_enrollmentdetail.class_section_id = tbl_class_section.class_section_id 
    WHERE tbl_class_section.class_section_id = '{$id}' ");
    return $result;
}


function kt_dk($id, $hk, $subject){
    $result = db_fetch_array("SELECT tbl_enrollmentdetail.* 
    FROM tbl_enrollmentdetail 
    JOIN tbl_enrollments ON tbl_enrollmentdetail.enrollment_id = tbl_enrollments.enrollment_id
    JOIN tbl_semester ON tbl_enrollments.semester_id = tbl_semester.semester_id
    JOIN tbl_semester_subject ON tbl_semester.semester_id = tbl_semester_subject.semester_id
    WHERE tbl_enrollments.student_id = '{$id}' AND tbl_semester.semester_id = '{$hk}' AND tbl_semester_subject.subject_id = '{$subject}' ");
    return $result;
}

function class_section_by($id){
    $result = db_fetch_row("SELECT * FROM `tbl_class_section` WHERE `class_section_id` = '{$id}'");
    return $result;
}


function mon_hoc_dk($id){
    $result = db_fetch_row("SELECT tbl_subject.* 
    FROM tbl_subject 
    JOIN tbl_semester_subject ON tbl_subject.subject_id = tbl_semester_subject.subject_id
    JOIN tbl_class_section ON tbl_semester_subject.semester_subject_id = tbl_class_section.semester_subject_id
    WHERE tbl_class_section.class_section_id = '{$id}'");
    return $result;
}

function date_start_end($id){
    $result = db_fetch_row("SELECT * FROM `tbl_start_end_date` WHERE  `class_section_id` = '{$id}'");
    return $result;
}

function schedule($id){
    $result = db_fetch_row("SELECT * FROM `tbl_schedule` WHERE  `start_end_date_id` = '{$id}'");
    return $result;
}

function classroom($id){
    $result = db_fetch_row("SELECT * FROM `tbl_classroom` WHERE  `classroom_id` = '{$id}'");
    return $result;
}

function kiemtraxemlopdaDk($subject , $student){
    $result = db_fetch_row("SELECT tbl_enrollmentdetail.* 
    FROM tbl_enrollmentdetail 
    JOIN tbl_class_section ON tbl_enrollmentdetail.class_section_id = tbl_class_section.class_section_id 
    JOIN tbl_semester_subject ON tbl_class_section.semester_subject_id = tbl_semester_subject.semester_subject_id
    JOIN tbl_enrollments ON tbl_enrollmentdetail.enrollment_id = tbl_enrollments.enrollment_id
    JOIN tbl_student ON tbl_enrollments.student_id = tbl_student.student_id
    WHERE tbl_semester_subject.subject_id = '{$subject}' AND tbl_student.student_id = '{$student}'");
    return $result;
}

function delete($subject_id, $student_id, $semester_id, $class){

    $join = "JOIN tbl_class_section ON tbl_enrollmentdetail.class_section_id = tbl_class_section.class_section_id 
    JOIN tbl_semester_subject ON tbl_class_section.semester_subject_id = tbl_semester_subject.semester_subject_id
    JOIN tbl_enrollments ON tbl_enrollmentdetail.enrollment_id = tbl_enrollments.enrollment_id
    JOIN tbl_student ON tbl_enrollments.student_id = tbl_student.student_id
    WHERE tbl_semester_subject.subject_id = '{$subject_id}' AND tbl_student.student_id = '{$student_id}' AND tbl_enrollments.semester_id = '{$semester_id}' AND tbl_enrollmentdetail.class_section_id = '{$class}' ";

    $result = db_delete_join( $join);
    return $result;
}


function list_semester($faculty_id, $course_id){

    $result = db_fetch_array("SELECT * FROM `tbl_semester` WHERE `faculty_id` = '{$faculty_id}' AND `course_id` = '{$course_id}'");
    
    return $result;
}

