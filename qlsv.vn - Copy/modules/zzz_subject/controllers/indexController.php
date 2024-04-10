<?php

function construct() {

    load_model('index');
}

function indexAction() {

    load_view('index');
}

function addAction() {

    load_view('add');
   
}

function detailAction(){
    load_view('detail');
}

function subjectAction(){

    $subject = $_POST['subject'];

    $class_hp = lop_hoc_phan($subject);

    $data = "";

    foreach ($class_hp as $key => $value) {
        # code...
        $slg_dk = dem_sl($value['class_section_id']);
        
        $semester_subject = semester_subject($value['semester_subject_id'])['subject_id'];
       
        $subject_name = subject_by_id($semester_subject)['subject_name'];

        $subject_id = subject_by_id($semester_subject)['subject_id'];
       
        $subject_credit = subject_by_id($semester_subject)['subject_credit'];

        $student = student($_SESSION['student_id']);

        $course_id = $student['course_id'];
    
        $faculty_id = $student['faculty_id'];

        $semester = semester($course_id, $faculty_id);

        $sldk = kt_dk($_SESSION['student_id'], $semester['semester_id'],subject_by_id($semester_subject)['subject_id']  );


        $a = " ";
        $text = "";


        $date = date("Y-m-d");

        foreach ($sldk as $key => $class) {

            if($value['class_section_id'] == $class['class_section_id']){
                $a = "checked='checked'";
                $text = "Đã đăng ký";

            }
        }
        
        $data .= " 
        <tr>
            <td><input type='radio' name='option' value = '{$value['class_section_id']}' $a  ></td>
            <td><span class='tbody-text'>{$value['class_section_code']}</h3></span>
            <td><span class='tbody-text'>{$value['class_section_name']}</span></td>
            <td><span data-subject = '{$subject_id}' class='tbody-text subject'>$subject_name</span></td>
            <td><span class='tbody-text'>$subject_credit</span></td>
            <td><span data-slg = '{$value['class_section_capacity']}' class='tbody-text slg'>{$value['class_section_capacity']}</span></td>
            <td><span data-slgdk = '{$slg_dk}' class='tbody-text slgdk'>$slg_dk</span></td>
            <td><span class='tbody-text'>$text</span></td>
           
        </tr>
        ";
        
    }

    $a = array(
        'subject' => $data
    );

    echo json_encode($a);
}


function dang_kyAction(){
    $semester_id = $_POST['semester_id'];
    $student_id = $_POST['student_id'];
    $selected = $_POST['selected'];
    $slg =  $_POST['slg'];
    $slgdk = $_POST['slgdk'];
    $subject_id = $_POST['subject_id'];

    $dem = empty_dangky($student_id, $semester_id);
    $data = array(
        'student_id' => $student_id,
        'semester_id' => $semester_id,
    );

   

    if($dem == 0){
        db_insert('tbl_enrollments', $data);
        $id = id_enrollment($student_id, $semester_id)['enrollment_id'];
    }else{
        $id = id_enrollment($student_id, $semester_id)['enrollment_id'];
    }

    $date = date("Y-m-d") ;

    $semester = semester_detail($semester_id);

    $a = array(
        'enrollment_id' => $id,
        'class_section_id' => $selected,
        'enrollmentDetail_date' => $date

    );

    $hien_tai = strtotime($date);
    $start = strtotime($semester['start']);
    $end = strtotime($semester['end']);

    if($hien_tai >= $start && $end >= $hien_tai){

        if(empty(kiemtraxemlopdaDk($subject_id, $student_id ))){

            if($selected != null){
    
                if($slg > $slgdk){
                    if(db_insert('tbl_enrollmentdetail',$a)){
                        echo "success";
                    }   
                }else{
                    echo "full";
                }
                
            }else{
                echo "fail";
            }
    
        }else{
    
            $id = kiemtraxemlopdaDk($subject_id, $student_id )['enrollmentDetail_id'];
            $data = array(
                'class_section_id' => $selected 
            );
            
            if(db_update('tbl_enrollmentdetail', $data, "`enrollmentDetail_id` = '{$id}'")){
                echo 'update';
             }
        }

    }else{
        echo 'expire';
    }

    
}

function deleteAction(){

    if(isset($_POST['checkboxValues'])){

        $semester_id = $_POST['semester_id'];

        $student_id = $_POST['student_id'];

        $checkboxes = $_POST['checkboxValues'];

        $dataIds = $_POST['dataIds'];

        $dem = 0;
    
        foreach ($checkboxes as $key => $value) {

            $dem++;
            delete($dataIds[$key], $student_id, $semester_id, $value);
            
        }

        if($dem == count($checkboxes)){

            echo "seccess";

        }
        else{
            echo "fail";
        }
        
    
       
    }

}

function detail_userAction(){
    load_view('detail_user');
}


function semesterAction(){
    $student = student($_SESSION['student_id']);

    $course_id = $student['course_id'];
    
    $faculty_id = $student['faculty_id'];

    $faculty_name = faculty($faculty_id)['faculty_name'];

    $course_name = course($course_id)['course_name'];

    $first_name = $student['first_name'];

    $last_name = $student['last_name'];

    $classs = classs($student['class_id']);

    // $semester = semester($course_id, $faculty_id);
    $semester_id = $_POST['semester']; 
    $semester = semester_by_id($semester_id);

    $list_subject = subject_semester($semester_id);

    $list_major = major($faculty_id);

    $kpDk = detailenrollment($student['student_id'], $semester_id );
    $z = "
        Kết quả đăng ký học tập của học kì  {$semester['semester_name']} năm học {$semester['school_year']} 
    ";


    $text = " ";
    $dem = 0;
    $tongTC = 0;
    
    foreach ($kpDk as $key => $thongtin) {
        $class = class_section_by($thongtin['class_section_id']);

        $class_name = $class['class_section_name'];

        $subject = mon_hoc_dk($class['class_section_id']);

        $date = date_start_end($class['class_section_id']);

        $data_strart_end = $date['start_end_date_id'];

        $schedule = schedule($data_strart_end);

        $classroom = classroom($schedule['classroom_id']);
     
        $tongTC += $subject['subject_credit'];

        $start = date('d-m-Y', strtotime($date['start_date']));
        $end = date('d-m-Y', strtotime($date['end_date']));

        $date = date('d-m-Y', strtotime($thongtin['enrollmentDetail_date']));

        


        $dem++;

        $text .= "
          <tr>
                <td><span class='thead-text'> $dem </span></td>
                <td><span class='thead-text'> $class_name</span></td>
                <td><div class='thead-text'>
                    <p> Từ $start  đến  $end</p>   
                    <b> Thứ {$schedule['schedule_day']} Tiết {$schedule['schedule_time']} </b> 
                </div></td> 
                <td><span class='thead-text'> {$classroom['room_name']} {$classroom['building_name']}</span></td>
                                            
                <td><span class='thead-text'> {$subject['subject_credit'] }</span></td>
                <td><span class='thead-text'> $date </span></td>
          </tr>

        ";

    }

    $text .= "

        <tr style = 'font-weight : bold'>
            <td><span class='thead-text'>  </span></td>
            <td><span class='thead-text'> Tổng </span></td>
            <td><div class='thead-text'>
                <p> </p>   
                <b> </b> 
            </div></td> 
            <td></td>
                                        
            <td><span class='thead-text'> $tongTC</span></td>
            <td></td>
        </tr>
    
    ";


    $data = array(
        'detail' => $z,
        'semester' => $text
    );

    echo json_encode($data);
}