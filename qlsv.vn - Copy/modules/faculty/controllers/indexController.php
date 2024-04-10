<?php

function construct() {

    load_model('index');
}

function indexAction() {  

    $list_faculty = get_list_faculty();
    $data['list_faculty'] = $list_faculty;

    load_view('index', $data);
}

function addAction() {
    
    load_view('add');
}

function add_facultyAction(){
    $faculty_code = $_POST['faculty_code'];
    $faculty_name = $_POST['faculty_name'];


    if(!empty($faculty_code) && !empty($faculty_name)){
        $data = array(
            'faculty_code' => $faculty_code,
            'faculty_name' => $faculty_name
        );
    }

    if(db_insert('tbl_faculty', $data)){
        echo 'success';
    }else{
        echo 'fail';
    }

}

function editAction() {
    $id = $_GET['id'];

    $faculty = faculty_by_id($id);
    $data['faculty'] = $faculty;

    load_view('edit', $data);
}

function edit_facultyAction(){
   
    $faculty_name = $_POST['faculty_name'];
    $faculty_code = $_POST['faculty_code'];
    $id = $_POST['faculty_id'];

    if(!empty($faculty_code) && !empty($faculty_name)){
        $data = array(
            'faculty_code' => $faculty_code,
            'faculty_name' => $faculty_name
        );
    }

    if(db_update('tbl_faculty', $data, "`faculty_id` = '{$id}' ")){
        echo 'success';
    }else{
        echo 'fail';
    }

}

function deleteAction(){
    $id = $_POST['faculty_id'];

    if(db_delete('tbl_faculty', " `faculty_id` = '{$id}' ")){
       echo "success";
    }else{
         echo "fail";
    }
}



function processAction(){
    $list_faculty = get_list_faculty();
    $page = $_POST['page'];
    $number = 5;
    $number_page = ceil(count($list_faculty)/$number);
    $start = ($page - 1) * $number;
    $result = phantrang_faculty($start, $number);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                     <td><span class='thead-text'>Mã khoa</span></td>
                    <td><span class='thead-text'>Tên khoa</span></td>
                    
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
       
       
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
            <td><span class='tbody-text'>{$value['faculty_code']}</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['faculty_name']} </a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=faculty&action=edit&id={$value['faculty_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li data-id = '{$value['faculty_id']}'><a class='delete_faculty' title='Xóa' class='edit'><i class='fa fa-trash' aria-hidden='true'></i></a></li>                
                    </ul>
            </td>
           
        </tr>
        ";
        
    }

    

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-faculty' data-page='$i'>$i</button>";
    }
        $list = array(
            'list' => $data,
            'page' => $list_page
        );
    echo json_encode($list);
}
