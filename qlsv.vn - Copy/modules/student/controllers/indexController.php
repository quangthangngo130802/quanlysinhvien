<?php

function construct() {

    load_model('index');
}

function indexAction() {
    $list_student = get_list_students();
    $data['list_student'] = $list_student;

    $list_faculty = list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_course = list_course();
    $data['list_course'] = $list_course;

    load_view('index', $data);
}

function deleteAction(){

    $student_id = $_POST['student_id'];

   
    if( db_delete('tbl_student', "`student_id` = '{$student_id}' ")){
        echo 'success';
    }else{
        echo 'fail';
    }
   
}



function addAction() {
    
   $list_faculty = list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_course = list_course();
    $data['list_course'] = $list_course; 
  
    global $error, $student_code, $first_name, $last_name,  $student_birth, $gender, $address, $email_student, $phone, $student_course, $student_class, $anh_img;
    $error = array();
    if(isset($_POST['add_student'])){
        
        if(empty($_POST['student_code'])){
            $error['student_code'] = "Không được để trống mã sinh viên ";
        }else{
            $student_code = $_POST['student_code'];
        }

        if(empty($_POST['first_name'])){
            $error['first_name'] = "Không được để trống họ ";
        }else{
            $first_name = $_POST['first_name'];
        }

        if(empty($_POST['last_name'])){
            $error['last_name'] = "Không được để trống Tên ";
        }else{
            $last_name = $_POST['last_name'];
        }

        if(empty($_POST['student_birth'])){
            $error['student_birth'] = "Không được để trống ngày sinh";
        }else{
            $student_birth = $_POST['student_birth'];
        }

        if(empty($_POST['gender'])){
            $error['gender'] = "Không được để trống giới tính";
        }else{
            $gender = $_POST['gender'];
        }

        if(empty($_POST['address'])){
            $error['address'] = "Không được để trống địa chỉ";
        }else{
            $address = $_POST['address'];
        }

        if(empty($_POST['email_student'])){
            $error['email_student'] = "Không được để trống email";
        }else{
            $email_student = $_POST['email_student'];
        }

        if(empty($_POST['phone'])){
            $error['phone'] = "Không được để trống số điện thoại";
        }else{
            $phone = $_POST['phone'];
        }

        $anh_img = $_POST['anh_img'];

        if(empty($_POST['student_course'])){
            $error['student_course'] = "Không được để trống khóa";
        }else{
            $student_course = $_POST['student_course'];
        }

        if(empty($_POST['student_class'])){
            $error['student_class'] = "Không được để trống số điện thoại";
        }else{
            $student_class = $_POST['student_class'];
        }

        if(!empty($error)){
            // echo " <script> alert('Mời nhập đủ thông tin sinh viên')</script>";
       }else{

            $check = check_code_email($student_code, $email_student);
            if(!$check){
                $insert = array(
                    'student_code' => $student_code,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'date_of_birth' => $student_birth,
                    'gender' => $gender,
                    'address' => $address,
                    'email' => $email_student,
                    'phone' => $phone,
                    'student_avatar' => $anh_img,
                    'class_id' =>  $student_class,
                    'course_id' =>  $student_course,          
                );
                
                if(db_insert('tbl_student', $insert)){
                    echo " <script> alert('Thêm thành công sinh viên mới ')</script>";
                }
            }else{
                $error['add_student'] =  " <script> alert('Mã sinh viên hoặc Email đã tồn tại')</script>";
            }
       }
    }
    load_view('add', $data);
}

function addexcelAction() {
    
   if(isset($_POST['btnGui'])){

        $inputFileName = $_FILES['file']['tmp_name'];
        $excel_extensions = array('xls', 'xlsx', 'xlsm', 'xlsb');

        $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        // Kiểm tra xem phần mở rộng của tệp có trong danh sách các phần mở rộng của tệp Excel không
        if(in_array($file_extension, $excel_extensions)) {
           
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);

            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    
            $objPHPExcel = $objReader->load($inputFileName);
            
            $sheet = $objPHPExcel->getSheet(0); 
    
            $highestRow = $sheet->getHighestRow();   
    
            $highestColumn = $sheet->getHighestColumn();
    
            $list = array();
    
            for ($row = 2; $row <= $highestRow; $row++){ 
    
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE,FALSE);
    
                $list[] = $rowData[0];
            }
            $dem=0;
            $list_data = array();
            foreach ($list as $key => $student) {
    
                $course = course_name($student[8])['course_id'];
                
                $class = class_name($student[9], $course)['class_id'];
                    //echo $class."   ";
                
                $unixTimestamp = ($student[3] - 25569) * 86400; // Chuyển đổi từ Excel timestamp sang Unix timestamp
               
                $gender = ($student[4]== 'Nam')? 'Male' : 'Female';

                $date = date("Y-m-d", $unixTimestamp);

                if( check_code_email($student[0], $student[5]) == 0 ){

                    $list_data[] = array(
                        'student_code' => $student[0],
                        'first_name' => $student[1],
                        'last_name' => $student[2],
                        'date_of_birth' => $date,
                        'gender' => $gender,
                        'address' => $student[5],
                        'email' => $student[6],
                        'phone' => $student[7],
                        'class_id' => $class,
                        'course_id' => $course
                    );
                   
                   $dem++;    

                }
                    
            }
            if($dem == count($list)){
                foreach ($list_data as $key => $data) {
                     db_insert('tbl_student', $data);
                }
                echo " <script> alert('Thêm thành công')</script>";
            }else{
                echo " <script> alert('Mã sinh viên hoặc email đã tồn tại ở một số sinh viên !')</script>";
            }
        } else {
            echo " <script> alert('Không phải file Excel !')</script>";
        }
       
    }
    load_view('addexcel');
}

function editAction() {
    $id = $_GET['id'];
 
    $student = student_by_id($id);
    $data['student'] = $student;
    $email = $student['email'];

    $list_faculty = list_faculty();
    $data['list_faculty'] = $list_faculty;

    $list_course = list_course();
    $data['list_course'] = $list_course; 
  
    global $error,  $first_name_edit, $last_name_edit,  $student_birth_edit, $gender_edit, $address_edit, $email_edit, $phone_edit, $student_faculty_edit, $student_course_edit, $student_class_edit;
    
    $error = array();

    if(isset($_POST['edit_student'])){
        
        if(empty($_POST['first_name_edit'])){
            $error['first_name_edit'] = "Không được để trống Họ ";
        }else{
            $first_name_edit = $_POST['first_name_edit'];
        }

        if(empty($_POST['last_name_edit'])){
            $error['last_name_edit'] = "Không được để trống Tên ";
        }else{
            $last_name_edit = $_POST['last_name_edit'];
        }

        if(empty($_POST['student_birth_edit'])){
            $error['student_birth_edit'] = "Không được để trống ngày sinh";
        }else{
            $student_birth_edit = $_POST['student_birth_edit'];
        }

        if(empty($_POST['gender_edit'])){
            $error['gender_edit'] = "Không được để trống giới tính";
        }else{
            $gender_edit = $_POST['gender_edit'];
        }

        if(empty($_POST['address_edit'])){
            $error['address_edit'] = "Không được để trống địa chỉ";
        }else{
            $address_edit = $_POST['address_edit'];
        }

        if(empty($_POST['email_edit'])){
            $error['email_edit'] = "Không được để trống email";
        }else{
            $email_edit = $_POST['email_edit'];
        }

        if(empty($_POST['phone_edit'])){
            $error['phone_edit'] = "Không được để trống số điện thoại";
        }else{
            $phone_edit = $_POST['phone_edit'];
        }

        if(empty($_POST['student_faculty_edit'])){
            $error['student_faculty_edit'] = "Không được để trống khoa";
        }else{
            $student_faculty_edit = $_POST['student_faculty_edit'];
        }

        if(empty($_POST['student_course_edit'])){
            $error['student_course_edit'] = "Không được để trống khóa";
        }else{
            $student_course_edit = $_POST['student_course_edit'];
        }

        if(empty($_POST['student_class_edit'])){
            $error['student_class_edit'] = "Không được để trống số điện thoại";
        }else{
            $student_class_edit = $_POST['student_class_edit'];
        }


        if(!empty($error)){
            // show_array($error);
            // echo " <script> alert('Mời nhập đủ thông tin sinh viên')</script>";
       }else{

            $check = check_code_email_edit($email_edit, $email);
             if($check <1 || ($check == 1 && $email == $email_edit)){
                $insert = array(
                    
                    'first_name' => $first_name_edit,
                    'last_name' => $last_name_edit,
                    'date_of_birth' => $student_birth_edit,
                    'gender' => $gender_edit,
                    'address' => $address_edit,
                    'email' => $email_edit,
                    'phone' => $phone_edit,
                    'class_id' =>  $student_class_edit,
                    'course_id' =>  $student_course_edit,          
                );
                
                
                if(db_update('tbl_student', $insert, " `student_id` = '{$id}' ")){
                    echo " <script> alert('Sửa thành công sinh viên ')</script>";
                }
               

             }else{
                 echo " <script> alert(' Email đã tồn tại')</script>";
             }
       }
    }

    load_view('edit', $data);
}

function facultyAction(){
    $faculty = $_POST['faculty'];
    $course = $_POST['course'];
    
    $list_class = list_class_by_faculty($faculty, $course); 
    echo json_encode($list_class);
}

function searchAction(){

    $code_student = $_POST['search'];

    $list_student = search_student($code_student);
   
    if(isset($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $number = 6;

    $number_page = ceil(count($list_student)/$number);

    $start = ($page - 1) * $number;

    $result = phantrang_search_student($start, $number, $code_student);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                    <td><span class='thead-text'>Mã sinh viên</span></td>
                    <td><span class='thead-text'>Họ và tên</span></td>
                    <td><span class='thead-text'>Ngày sinh</span></td>
                    <td><span class='thead-text'>Giới tính</span></td>
                    <td><span class='thead-text'>Địa chỉ</span></td>
                    <td><span class='thead-text'>Email</span></td>
                    <td><span class='thead-text'>Điện thoại</span></td>
                    <td><span class='thead-text'>Hình ảnh</span></td>
                    <td><span class='thead-text'>Khóa</span></td>
                    <td><span class='thead-text'>Lớp</span></td>
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
        $gender = ($value['gender'] == 'male')? "Nam" : "Nữ";
        $class_name = class_student_class($value['class_id'])['class_name'];
        $course_student = course_student($value['course_id'])['course_name'];
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
            <td><span class='tbody-text'>{$value['student_code']}</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['first_name']} {$value['last_name']}</a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=student&action=edit&id={$value['student_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li data-id = '{$value['student_id']}'><a class='delete_student' title='Xóa' class='edit'><i class='fa fa-trash' aria-hidden='true'></i></a></li>                
                </ul>
            </td>
            <td><span class='tbody-text'>{$value['date_of_birth']}</span></td>
            <td><span class='tbody-text'>{$gender}</span></td>
            <td><span class='tbody-text'>{$value['address']}</span></td>
            <td><span class='tbody-text'>{$value['email']}</span></td>
            <td><span class='tbody-text'>{$value['phone']}</span></td>
            <td><img class='anh_img' src='public/images/img/{$value['student_avatar']}' alt=''></td>
            <td><span class='tbody-text'>{$course_student}</span></td>
            <td><span class='tbody-text'>{$class_name}</span></td>
        </tr>
        ";
        
    }

    

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-search' data-page='$i'>$i</button>";
    }
        $list = array(
            'search' => $data,
            'page_search' => $list_page
        );
    echo json_encode($list);
}

function timkiemAction(){

    $student_faculty = $_POST['student_faculty'];

    $student_course = $_POST['student_course'];

    $student_class = $_POST['student_class'];

    $code_student = $_POST['code_student'];

    $list_student = "";

    if($student_faculty != 0 ){

        if($code_student != null){

            if($student_course != 0){

                if($student_class !=0){
                    $list_student = search_student("`student_code` LIKE '%{$code_student}%' AND `faculty_id` = '{$student_faculty}' AND `class_id` = '{$student_class}' AND `course_id` = '{$student_course}'");

                }else{
                    $list_student = search_student("`student_code` LIKE '%{$code_student}%' AND `faculty_id` = '{$student_faculty}' AND `course_id` = '{$student_course}'");
                }


            }else{        
                    
                    $list_student = search_student(" `student_code` LIKE '%{$code_student}%' AND `faculty_id` = '{$student_faculty}' ");
    
            }

        }else{

            if($student_course != 0){

                if($student_class !=0){

                    $list_student = search_student(" `faculty_id` = '{$student_faculty}' AND `class_id` = '{$student_class}' AND `course_id` = '{$student_course}'");
                }else{
                   
                    $list_student = search_student("`faculty_id` = '{$student_faculty}' AND `course_id` = '{$student_course}'");
                }


            }else{
    
               
                    $list_student = search_student(" `faculty_id` = '{$student_faculty}' ");
                
    
            }
        }

    }else{

        if($code_student != null){

            $list_student = search_student("`student_code` LIKE '%{$code_student}%'");
           
        }
        else{
            $list_student = search_student("");
        }
    }

   
    if(isset($_POST["page"])) {
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $number = 6;

    $number_page = ceil(count($list_student)/$number);

    $start = ($page - 1) * $number;

    

    $result = "";

    if($student_faculty != 0 ){

        if($code_student != null){

            if($student_course != 0){

                if($student_class !=0){
                    $result = phantrang_search_student($start, $number, "`student_code` LIKE '%{$code_student}%' AND `faculty_id` = '{$student_faculty}' AND `class_id` = '{$student_class}' AND `course_id` = '{$student_course}'");
                }else{
                    $result = phantrang_search_student($start, $number, "`student_code` LIKE '%{$code_student}%' AND `faculty_id` = '{$student_faculty}' AND `course_id` = '{$student_course}'");
                }


            }else{
    
                
                    $result = phantrang_search_student($start, $number, " `student_code` LIKE '%{$code_student}%' AND `faculty_id` = '{$student_faculty}' ");
                
            }

        }else{

            if($student_course != 0){

                if($student_class !=0){
                    $result = phantrang_search_student($start, $number, " `faculty_id` = '{$student_faculty}' AND `class_id` = '{$student_class}' AND `course_id` = '{$student_course}'");
                }else{
                    $result = phantrang_search_student($start, $number, "`faculty_id` = '{$student_faculty}' AND `course_id` = '{$student_course}'");
                }


            }else{
    
               
                    $result = phantrang_search_student($start, $number, " `faculty_id` = '{$student_faculty}' ");
               
    
            }
        }

    }else{

        if($code_student != null){     
            $result = phantrang_search_student($start, $number, "`student_code` LIKE '%{$code_student}%'");
        }else{
            $result = phantrang_search_student($start, $number, "");
        }
    }

    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                    <td><span class='thead-text'>Mã sinh viên</span></td>
                    <td><span class='thead-text'>Họ và tên</span></td>
                    <td><span class='thead-text'>Ngày sinh</span></td>
                    <td><span class='thead-text'>Giới tính</span></td>
                    <td><span class='thead-text'>Địa chỉ</span></td>
                    <td><span class='thead-text'>Email</span></td>
                    <td><span class='thead-text'>Điện thoại</span></td>
                    <td><span class='thead-text'>Hình ảnh</span></td>
                    <td><span class='thead-text'>Khóa</span></td>
                    <td><span class='thead-text'>Lớp</span></td>
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
        $gender = ($value['gender'] == 'male')? "Nam" : "Nữ";
        $class_name = class_student_class($value['class_id'])['class_name'];
        $course_student = course_student($value['course_id'])['course_name'];
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
            <td><span class='tbody-text'>{$value['student_code']}</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['first_name']} {$value['last_name']}</a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=student&action=edit&id={$value['student_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li data-id = '{$value['student_id']}'><a class='delete_student' title='Xóa' class='edit'><i class='fa fa-trash' aria-hidden='true'></i></a></li>                
                </ul>
            </td>
            <td><span class='tbody-text'>{$value['date_of_birth']}</span></td>
            <td><span class='tbody-text'>{$gender}</span></td>
            <td><span class='tbody-text'>{$value['address']}</span></td>
            <td><span class='tbody-text'>{$value['email']}</span></td>
            <td><span class='tbody-text'>{$value['phone']}</span></td>
            <td><img class='anh_img' src='public/images/img/{$value['student_avatar']}' alt=''></td>
            <td><span class='tbody-text'>{$course_student}</span></td>
            <td><span class='tbody-text'>{$class_name}</span></td>
        </tr>
        ";
        
    }

    

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link-search' data-page='$i'>$i</button>";
    }
        $list = array(
            'search' => $data,
            'page_search' => $list_page
        );
    echo json_encode($list);
}


function processAction(){
    $list_student = get_list_students();
    $page = $_POST['page'];

    $number = 6;

    $number_page = ceil(count($list_student)/$number);

    $start = ($page - 1) * $number;

    $result = phantrang_student($start, $number);
    $data = "";
    $data .= "
    <table class='table list-table-wp'>
            <thead>
                <tr>
                    <td><input type='checkbox' name='checkAll' id='checkAll'></td>
                    <td><span class='thead-text'>STT</span></td>
                    <td><span class='thead-text'>Mã sinh viên</span></td>
                    <td><span class='thead-text'>Họ và tên</span></td>
                    <td><span class='thead-text'>Ngày sinh</span></td>
                    <td><span class='thead-text'>Giới tính</span></td>
                    <td><span class='thead-text'>Địa chỉ</span></td>
                    <td><span class='thead-text'>Email</span></td>
                    <td><span class='thead-text'>Điện thoại</span></td>
                    <td><span class='thead-text'>Ảnh</span></td>
                    <td><span class='thead-text'>Khóa</span></td>
                    <td><span class='thead-text'>Lớp</span></td>
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
        $gender = ($value['gender'] == 'male')? "Nam" : "Nữ";
        $class_name = class_student_class($value['class_id'])['class_name'];
        $course_student = course_student($value['course_id'])['course_name'];
        $stt +=  1;
        
        $data .= " 
        <tr>
            <td><input type='checkbox' name='checkItem' class='checkItem'></td>
            <td><span class='tbody-text'>$stt</h3></span>
            <td><span class='tbody-text'>{$value['student_code']}</h3></span>
           
            <td class='clearfix'>
                <div class='tb-title fl-left'>
                    <a href='' title=''>{$value['first_name']} {$value['last_name']}</a>
                </div>
                <ul class='list-operation fl-right' style = 'display : flex'>
                    <li><a href='?mod=student&action=edit&id={$value['student_id']}' title='Sửa' class='edit'><i class='fas fa-pencil-alt' aria-hidden='true'></i></a></li>
                    <li data-id = '{$value['student_id']}'><a class='delete_student' title='Xóa' class='edit'><i class='fa fa-trash' aria-hidden='true'></i></a></li>                
                </ul>
            </td>
            <td><span class='tbody-text'>{$value['date_of_birth']}</span></td>
            <td><span class='tbody-text'>{$gender}</span></td>
            <td><span class='tbody-text'>{$value['address']}</span></td>
            <td><span class='tbody-text'>{$value['email']}</span></td>
            <td><span class='tbody-text'>{$value['phone']}</span></td>
            <td><img class='anh_img' src='public/images/img/{$value['student_avatar']}' alt=''></td>
            <td><span class='tbody-text'>{$course_student}</span></td>
            <td><span class='tbody-text'>{$class_name}</span></td>
        </tr>
        ";
        
    }

    

    $list_page = "";
    for ($i = 1; $i <= $number_page; $i++) {
        $list_page .=  "<button style = 'margin-right: 10px' class='pagination-link' data-page='$i'>$i</button>";
    }
        $list = array(
            'list' => $data,
            'page' => $list_page
        );
    echo json_encode($list);
}
