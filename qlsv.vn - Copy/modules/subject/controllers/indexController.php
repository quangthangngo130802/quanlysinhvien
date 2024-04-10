<?php

function construct() {

    load_model('index');
}

function indexAction() {
    // $list_class = get_list_class();
    // $data['list_class'] = $list_class;

  
    load_view('index');
}

function addAction() {

    $list_major = get_list_major();
    $data['list_major'] = $list_major;

    $list_teacher = get_list_teacher();
    $data['list_teacher'] = $list_teacher;

    $list_semester = get_list_semester();
    $data['list_semester'] = $list_semester;

    $list_faculty = get_list_faculty();
    $data['list_faculty'] = $list_faculty;

    load_view('add', $data);
   
}

function add_subjectAction(){
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $subject_credit = $_POST['subject_credit'];
    $subject_major = $_POST['subject_major'];
    

    $data = array(
        'subject_code' => $subject_code,
        'subject_name' => $subject_name,
        'subject_credit' => $subject_credit,
        'major_id' => $subject_major,
       
    );

    if(db_insert('tbl_subject', $data)){
        echo "success";
    }else{
        echo "fail";
    }

}

function editAction() {
    $id = $_GET['id'];

    $list_faculty = get_list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_major = get_list_major();
    $data['list_major'] = $list_major;

    $list_teacher = get_list_teacher();
    $data['list_teacher'] = $list_teacher;

    $list_semester = get_list_semester();
    $data['list_semester'] = $list_semester;

    $subject = subject_by_id($id);
    $data['subject'] = $subject;

    
    load_view('edit', $data);
   
}

function edit_subjectAction(){
    $subject_name = $_POST['subject_name'];
    $subject_credit = $_POST['subject_credit'];
    $subject_major = $_POST['subject_major'];
    $subject_teacher = $_POST['subject_teacher'];
    $subject_semester = $_POST['subject_semester'];
    $id = $_POST['subject_id'];

    $data = array(
        'subject_name' => $subject_name,
        'subject_credit' => $subject_credit,
        'major_id' => $subject_major,
        'teacher_id' => $subject_teacher,
        'semester_id' => $subject_semester
    );

    if(db_update('tbl_subject', $data, "`subject_id` = '{$id}'")){
        echo "success";
    }else{
        echo "fail";
    }

}


function processAction(){
    $list_subject = get_list_subject();
    $page = $_POST['page'];
    $number = 6;
    $number_page = ceil(count($list_subject)/$number);
    $start = ($page - 1) * $number;

    $result = phantrang_subject($start, $number);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                    <td><span class='thead-text'>Tên môn học</span></td>
                    <td><span class='thead-text'>Tín chỉ</span></td>
                    <td><span class='thead-text'>Chuyên ngành</span></td>
                            
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
        
      
        $major_name = major_name_by_id($value['major_id'])['major_name'];
      
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['subject_name']} </a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=subject&action=edit&id={$value['subject_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li><a href='?mod=subject&action=delete&id={$value['subject_id']}' title='Xóa' class='delete'><i class='fa fa-trash' aria-hidden='true'></i></a></li>
                </ul>
            </td>
              
            <td><span class='tbody-text'>{$value['subject_credit']}</span></td>
            <td><span class='tbody-text'>{$major_name}</span></td>
           
          
            
        </tr>
        ";
        
    }

    

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-subject' data-page='$i'>$i</button>";
    }
        $list = array(
            'list' => $data,
            'page' => $list_page
        );
    echo json_encode($list);
}
