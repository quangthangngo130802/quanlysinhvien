<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction() {
    
    $students = get_list_student();
    $data['students'] = $students;

    $class = get_list_class();
    $data['class'] = $class;

    $subjects = get_list_subject();
    $data['subjects'] = $subjects;

    $teachers = get_list_teacher();
    $data['teachers'] = $teachers;

    $facultys = get_list_faculty();
    $data['facultys'] = $facultys;

    $majors = list_major();
    $data['majors'] = $majors;

    

    load_view('index', $data);
}

function bieudo_svAction(){
    $students = student();
    //$data = array();
    foreach ($students as $key => $row) {
        if($row['course_id'] == 1){
            $row['year'] = '2020';
        }elseif($row['course_id'] == 2){
            $row['year'] = '2021';
        }elseif($row['course_id'] == 3){
            $row['year'] = '2022';
        }elseif($row['course_id'] == 4){
            $row['year'] = '2023';
        }
        $data[] = $row;
    }
    echo json_encode($data);


}

function bieudo_teacherAction(){
    $teacher = teacher();
    
  
    foreach($teacher as $key => $row){
        if($row['education_id'] == education($row['education_id'])['education_id']){
            $row['education'] = education($row['education_id'])['education_name'];
        }
        $data[] = $row;
    }
    
    echo json_encode($data);


}


