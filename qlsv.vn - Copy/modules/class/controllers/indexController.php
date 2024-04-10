<?php

function construct() {

    load_model('index');
}

function indexAction() {
    $list_class = get_list_class();
    $data['list_class'] = $list_class;

  
    load_view('index', $data);
}

function addAction() {
    
    $list_faculty = get_list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_couse = get_list_couse();
    $data['list_course'] = $list_couse;

    $list_teacher = get_list_teacher();
    $data['list_teacher'] = $list_teacher;

    global $error,$class_code, $class_name, $faculty_class, $couse,  $teacher_class ;
    $error = array();
    if(isset($_POST['add_class'])){

        if(empty($_POST['class_code'])){
            $error['class_code'] = "Không được để trống thông tin ";
        }else{
            $class_code = $_POST['class_code'];
        }
        
        if(empty($_POST['class_name'])){
            $error['class_name'] = "Không được để trống thông tin ";
        }else{
            $class_name = $_POST['class_name'];
        }

        if(empty($_POST['faculty_class'])){
            $error['faculty_class'] = "Không được để trống thông tin ";
        }else{
            $faculty_class = $_POST['faculty_class'];
        }

        if(empty($_POST['couse'])){
            $error['couse'] = "Không được để trống thông tin";
        }else{
            $couse = $_POST['couse'];
        }

        if(empty($_POST['teacher_class'])){
            $error['teacher_class'] = "Không được để trống thông tin";
        }else{
            $teacher_class = $_POST['teacher_class'];
        }

        
        if(!empty($error)){
            //echo " <script> alert('Mời nhập đủ thông tin sinh viên')</script>";
            // show_array($error);
        }else{

             $check = number_teacher_by($teacher_class);
             if(!$check){
                $insert = array(
                    'class_code' => $class_code,
                    'class_name' => $class_name,
                    'faculty_id' => $faculty_class,
                    'course_id' => $couse,
                    'teacher_id' => $teacher_class,
                              
                );
                db_insert('tbl_class', $insert);
                echo " <script> alert('Thêm thành công')</script>";

             }else{
                $error['add_class'] = 'Mỗi giảng viên được hướng dẫn một lớp !';
             }
       }
    }

    load_view('add', $data);
}

function editAction() {
    $id = $_GET['id'];

    $list_faculty = get_list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_couse = get_list_couse();
    $data['list_course'] = $list_couse;

    $list_teacher = get_list_teacher();
    $data['list_teacher'] = $list_teacher;

   
    $class = class_by_id($id);
    $data['class'] = $class;


    global $error,  $class_name, $faculty_class, $couse,  $teacher_class ;
    $error = array();
    
    if(isset($_POST['edit_class'])){

        if(empty($_POST['class_name'])){
            $error['class_name'] = "Không được để trống thông tin ";
        }else{
            $class_name = $_POST['class_name'];
        }

        if(empty($_POST['faculty_class'])){
            $error['faculty_class'] = "Không được để trống thông tin ";
        }else{
            $faculty_class = $_POST['faculty_class'];
        }

        if(empty($_POST['couse'])){
            $error['couse'] = "Không được để trống thông tin";
        }else{
            $couse = $_POST['couse'];
        }

        if(empty($_POST['teacher_class'])){
            $error['teacher_class'] = "Không được để trống thông tin";
        }else{
            $teacher_class = $_POST['teacher_class'];
        }

        
        if(!empty($error)){
           
        }else{            
                $update = array(
                    'class_name' => $class_name,
                    'faculty_id' => $faculty_class,
                    'course_id' => $couse,
                    'teacher_id' => $teacher_class               
                );
              

                if(db_update('tbl_class', $update, "`class_id` = '{$id}'")){
                    
                     echo " <script> alert('Sửa thành công')</script>";
                    
                }
            
       }
    }


   
    load_view('edit', $data);
}

function teacher_facultyAction(){
    $faculty = $_POST['faculty'];
    
    $list_teacher = teacher_name_by_faculty($faculty); 

    echo json_encode($list_teacher);
}

function processAction(){
    $list_class = get_list_class();
    $page = $_POST['page'];
    $number = 6;
    $number_page = ceil(count($list_class)/$number);
    $start = ($page - 1) * $number;

    $result = phantrang_class($start, $number);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                    <td><span class='thead-text'>Mã lớp</span></td>
                    <td><span class='thead-text'>Tên lớp</span></td>
                    <td><span class='thead-text'>Khoa</span></td>
                    <td><span class='thead-text'>Khóa</span></td>
                    <td><span class='thead-text'>Giảng viên</span></td>
                    <td><span class='thead-text'>Năm</span></td>
                   
                </tr>
            </thead>
        <tbody> ";
    $stt = 0;
    if($page == 1){   
    }else{
        $stt += ($page - 1)*$number;  
    }
    foreach ($result as $key => $value) {
        # code...
        
        $course_name = course_name_by_id($value['course_id'])['course_name'];
        $course_year = course_name_by_id($value['course_id'])['year_of_admission'];
        $faculty_name = faculty_name_by_id($value['faculty_id'])['faculty_name'];
        $teacher_name = teacher_name_by_id($value['teacher_id'])['teacher_name'];
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
            <td><span class='tbody-text'>{$value['class_code']}</span></td>
            <td class='clearfix'>
           
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['class_name']} </a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=class&action=edit&id={$value['class_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li><a href='?mod=class&action=delete&id={$value['class_id']}' title='Xóa' class='delete'><i class='fa fa-trash' aria-hidden='true'></i></a></li>
                </ul>
            </td>

            <td><span class='tbody-text'>{$faculty_name}</span></td>

            <td><span class='tbody-text'>{$course_name}</span></td>

            <td><span class='tbody-text'>{$teacher_name}</span></td>  

            <td><span class='tbody-text'>{$course_year}</span></td>    

        </tr>
        ";
        
    }

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-class' data-page='$i'>$i</button>";
    }
        $list = array(
            'list' => $data,
            'page' => $list_page
        );
    echo json_encode($list);
}
