<?php

function construct() {

    load_model('index');
}

function indexAction() {
    load_view('index');
}


function addAction() {
    
    $list_faculty = list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_education = list_education();
    $data['list_education'] = $list_education;

    $list_chucvu = list_chucvu();
    $data['chucvu'] = $list_chucvu;

    global $error, $teacher_name, $teacher_email, $teacher_address, $teacher_phone,$teacher_birth ,$gender_teacher, $teacher_faculty, $chucvu, $education;
    $error= array();
    if(isset($_POST['add_teacher'])){

        if(empty($_POST['teacher_name'])){
            $error['teacher_name'] = "Không được để trống thông tin ";        
        }else{
            $teacher_name = $_POST['teacher_name'];
        }

        if(empty($_POST['teacher_email'])){
            $error['teacher_email'] = "Không được để trống thông tin ";        
        }else{
            $teacher_email = $_POST['teacher_email'];
        }

        if(empty($_POST['teacher_address'])){
            $error['teacher_address'] = "Không được để trống thông tin ";        
        }else{
            $teacher_address = $_POST['teacher_address'];
        }

        if(empty($_POST['teacher_phone'])){
            $error['teacher_phone'] = "Không được để trống thông tin ";        
        }else{
            $teacher_phone = $_POST['teacher_phone'];
        }

        if(empty($_POST['teacher_birth'])){
            $error['teacher_birth'] = "Không được để trống thông tin ";        
        }else{
            $teacher_birth = $_POST['teacher_birth'];
        }

        if(empty($_POST['gender_teacher'])){
            $error['gender_teacher'] = "Không được để trống thông tin ";        
        }else{
            $gender_teacher = $_POST['gender_teacher'];
        }

        if(empty($_POST['teacher_faculty'])){
            $error['teacher_faculty'] = "Không được để trống thông tin ";        
        }else{
            $teacher_faculty = $_POST['teacher_faculty'];
        }

        if(empty($_POST['chucvu'])){
            $error['chucvu'] = "Không được để trống thông tin ";        
        }else{
            $chucvu = $_POST['chucvu'];
        }

        
        if(empty($_POST['education'])){
            $error['education'] = "Không được để trống thông tin ";        
        }else{
            $education = $_POST['education'];
        }

        // show_array($_POST);
        if(!empty($error)){
        //    show_array($error);
        }else{
            $data_teacher = array(
                'teacher_name' => $teacher_name,
                'email' => $teacher_email,
                'address' => $teacher_address,
                'phone' => $teacher_phone,
                'teacher_date_of_birth' => $teacher_birth,
                'gender' => $gender_teacher ,
                'faculty_id' => $teacher_faculty,
                'chucvu_id' =>  $chucvu            
            );

           
            if(!check_code_email($teacher_email)){
                 db_insert('tbl_teacher', $data_teacher);
                
            }else{
                 echo "<script>alert('Email đã tồn tại')</script>";
            }
           
        }

    }
    load_view('add', $data);
}

// function add_teacherAction(){

//     $teacher_name = $_POST['teacher_name'];
//     $teacher_email = $_POST['teacher_email'];
//     $teacher_address = $_POST['teacher_address'];
//     $teacher_phone = $_POST['teacher_phone'];
//     $teacher_birth = $_POST['teacher_birth'];
//     $gender_teacher = $_POST['gender_teacher'];
//     $teacher_faculty = $_POST['teacher_faculty'];
//     $chucvu = $_POST['chucvu'];
//     $education = $_POST['education'];

//     $data = array(
        
//     );

//     if(db_insert('tbl_teacher', $data)){
//         echo "success";
//     }else{
//         echo "fail";
//     }

// }

function editAction() {
   
    $id  = $_GET['id'];

    $teacher = get_teacher_by_id($id);
    $data['teacher'] = $teacher;

    $list_faculty = list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_chucvu = list_chucvu();
    $data['chucvu'] = $list_chucvu;

    global $error_edit, $teacher_name_edit, $teacher_email_edit, $teacher_address_edit, $teacher_phone_edit,$teacher_birth_edit ,$gender_teacher_edit, $teacher_faculty_edit, $chucvu_edit;
    $error_edit = array();
    if(isset($_POST['edit_student'])){

        if(empty($_POST['teacher_name_edit'])){
            $error_edit['teacher_name_edit'] = "Không được để trống thông tin ";        
        }else{
            $teacher_name_edit = $_POST['teacher_name_edit'];
        }

        if(empty($_POST['teacher_email_edit'])){
            $error_edit['teacher_email_edit'] = "Không được để trống thông tin ";        
        }else{
            $teacher_email_edit = $_POST['teacher_email_edit'];
        }

        if(empty($_POST['teacher_address_edit'])){
            $error_edit['teacher_address_edit'] = "Không được để trống thông tin ";        
        }else{
            $teacher_address_edit = $_POST['teacher_address_edit'];
        }

        if(empty($_POST['teacher_phone_edit'])){
            $error_edit['teacher_phone_edit'] = "Không được để trống thông tin ";        
        }else{
            $teacher_phone_edit = $_POST['teacher_phone_edit'];
        }

        if(empty($_POST['teacher_birth_edit'])){
            $error_edit['teacher_birth_edit'] = "Không được để trống thông tin ";        
        }else{
            $teacher_birth_edit = $_POST['teacher_birth_edit'];
        }

        if(empty($_POST['gender_teacher_edit'])){
            $error_edit['gender_teacher_edit'] = "Không được để trống thông tin ";        
        }else{
            $gender_teacher_edit = $_POST['gender_teacher_edit'];
        }

        if(empty($_POST['teacher_faculty_edit'])){
            $error_edit['teacher_faculty_edit'] = "Không được để trống thông tin ";        
        }else{
            $teacher_faculty_edit = $_POST['teacher_faculty_edit'];
        }

        if(empty($_POST['chucvu'])){
            $error_edit['chucvu'] = "Không được để trống thông tin ";        
        }else{
            $chucvu_edit = $_POST['chucvu'];
        }

        if(!empty($error_edit)){
           show_array($error_edit);
        }else{
            $data_teacher = array(
                'teacher_name' => $teacher_name_edit,
                'email' => $teacher_email_edit,
                'address' => $teacher_address_edit,
                'phone' => $teacher_phone_edit,
                'teacher_date_of_birth' => $teacher_birth_edit,
                'gender' => $gender_teacher_edit ,
                'faculty_id' => $teacher_faculty_edit,
                'chucvu_id' =>  $chucvu_edit            
            );

            if(!check_code_email($teacher_email_edit)){
                db_update('tbl_teacher', $data_teacher, " `teacher_id` = '{$id}' ");
                
            }else{
                 echo "<script>alert('Email đã tồn tại')</script>";
            }
           
        }

    }
    load_view('edit', $data);
}

function deleteAction(){
    $id = $_POST['teacher_id'];

    if(db_delete('tbl_teacher', " `teacher_id` = '{$id}' ")){
       echo "success";
    }else{
         echo "fail";
    }
}

function searchAction(){

    $teacher_name = $_POST['search'];

    $list_teacher = search_teacher($teacher_name);
   
    if(isset($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $number = 6;

    $number_page = ceil(count($list_teacher)/$number);

    $start = ($page - 1) * $number;

    $result = phantrang_search_teacher($start, $number, $teacher_name);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                    <td><span class='thead-text'>Họ và tên</span></td>
                    <td><span class='thead-text'>Email</span></td>
                    <td><span class='thead-text'>Địa chỉ</span></td>
                    <td><span class='thead-text'>Số điện thoại</span></td>
                    <td><span class='thead-text'>Ngày sinh</span></td>
                    <td><span class='thead-text'>Giới tính</span></td>
                    <td><span class='thead-text'>Khoa</span></td>
                    <td><span class='thead-text'>Ảnh</span></td>
                    <td><span class='thead-text'>Chức vụ</span></td>
                    <td><span class='thead-text'>Trình độ</span></td>
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
        $gender = ($value['gender'] == 'Male')? "Nam" : "Nữ";
        $faculty_name = faculty_by_id($value['faculty_id'])['faculty_name'];
        $chucvu_name = chucu_by_id($value['chucvu_id'])['chucvu_name'];
        $education = education($value['education_id'])['education_name'];
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['teacher_name']}</a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=teacher&action=edit&id={$value['teacher_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li data-id = '{$value['teacher_id']}'><a class='delete_teacher' title='Xóa' class='edit'><i class='fa fa-trash' aria-hidden='true'></i></a></li>                
                </ul>
            </td>
            <td><span class='tbody-text'>{$value['email']}</span></td>
            <td><span class='tbody-text'>{$value['address']}</span></td>
            <td><span class='tbody-text'>{$value['phone']}</span></td>
            <td><span class='tbody-text'>{$value['teacher_date_of_birth']}</span></td>
            <td><span class='tbody-text'>{$gender}</span></td>
            <td><span class='tbody-text'>{$faculty_name}</span></td>
            <td><img class='anh_img' src='public/images/img/{$value['teacher_avatar']}' alt=''></td>
            <td><span class='tbody-text'>{$chucvu_name}</span></td>
            <td><span class='tbody-text'>{$education}</span></td>
            
        ";
    }

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-search-teacher' data-page='$i'>$i</button>";
    }
        $list = array(
            'search' => $data,
            'page_search' => $list_page
        );
    echo json_encode($list);
}


function processAction(){
    $list_teacher = get_list_teacher();
    $page = $_POST['page'];

    $number = 6;

    $number_page = ceil(count($list_teacher)/$number);

    $start = ($page - 1) * $number;

    $result = phantrang_teacher($start, $number);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                   
                    <td><span class='thead-text'>Họ và tên</span></td>
                   
                    <td><span class='thead-text'>Email</span></td>
                    <td><span class='thead-text'>Địa chỉ</span></td>
                    <td><span class='thead-text'>Số điện thoại</span></td>
                    <td><span class='thead-text'>Ngày sinh</span></td>
                    <td><span class='thead-text'>Giới tính</span></td>
                    <td><span class='thead-text'>Khoa</span></td>
                    <td><span class='thead-text'>Ảnh</span></td>
                    <td><span class='thead-text'>Chức vụ</span></td>
                    <td><span class='thead-text'>Trình độ</span></td>
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
        $gender = ($value['gender'] == 'Male')? "Nam" : "Nữ";
        $faculty_name = faculty_by_id($value['faculty_id'])['faculty_name'];
        $chucvu_name = chucu_by_id($value['chucvu_id'])['chucvu_name'];
        $education = education($value['education_id'])['education_name'];
        $stt +=  1;
       
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['teacher_name']}</a>
                   
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=teacher&action=edit&id={$value['teacher_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li data-id = '{$value['teacher_id']}'><a class='delete_teacher' title='Xóa' class='edit'><i class='fa fa-trash' aria-hidden='true'></i></a></li>
                    
                </ul>
            </td>
         
            <td><span class='tbody-text'>{$value['email']}</span></td>
            <td><span class='tbody-text'>{$value['address']}</span></td>
            <td><span class='tbody-text'>{$value['phone']}</span></td>
            <td><span class='tbody-text'>{$value['teacher_date_of_birth']}</span></td>
            <td><span class='tbody-text'>{$gender}</span></td>
            <td><span class='tbody-text'>{$faculty_name}</span></td>
            <td><img class='anh_img' src='public/images/img/{$value['teacher_avatar']}' alt=''></td>
            <td><span class='tbody-text'>{$chucvu_name}</span></td>
            <td><span class='tbody-text'>{$education}</span></td>
            
        ";
    }

    

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-teacher' data-page='$i'>$i</button>";
    }
        $list = array(
            'list' => $data,
            'page' => $list_page
        );
    echo json_encode($list);
}
