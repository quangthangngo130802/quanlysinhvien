<?php  get_header('user') ;

    $student = student($_SESSION['student_id']);

    $course_id = $student['course_id'];
    
    $faculty_id = $student['faculty_id'];

    $faculty_name = faculty($faculty_id)['faculty_name'];

    $course_name = course($course_id)['course_name'];

    $first_name = student($_SESSION['student_id'])['first_name'];

    $last_name = student($_SESSION['student_id'])['last_name'];

    $classs = classs($student['class_id']);

    $semester = semester($course_id, $faculty_id);

    $list_subject = subject_semester($semester['semester_id']);

    $list_major = major($faculty_id);

    $kpDk = detailenrollment($student['student_id'], $semester['semester_id'] );

    $list_semester = list_semester($faculty_id, $course_id);

?>
<style>
   #list_semester{
    padding: 10px 20px;
   }
  
</style>
<link rel="stylesheet" href="public/css/dang_ky_hoc.css">
<script src="public/js/a.user_subject/select_semester.js"></script>
<div id="main-content-wp" class="list-product-page" style="display: flex;">
    
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right" style="padding: 0px;">
            <div class="section" id="title-page">
                
            </div>
            <div class="section" id="detail-page">

                <div class="section-detail">

                    <div id="list_semester">
                        <form action="" method="get">
                            <label for="">Học kì : </label>
                            <select name="" id="option_semester">
                            <?php
                               
                                foreach ($list_semester as $key => $value) {
                                    # code...
                                    if($value['IsOpenForRegistration'] == 1){
                                        $a = "selected='selected'";
                                    }else{
                                        $a = "";
                                    }
                            ?> 
                              <option <?php echo $a ?> value="<?php echo $value['semester_id'] ?>" > <?php echo $value['semester_name']."_".$value['school_year'] ?> </option>
                            <?php 
                                }
                            ?>
                            </select>
                        </form>
                    </div>

                    <div id="detail_student">

                        <div>
                            <p id="news">
                                <?php echo $student['student_code']." - ".$first_name." ".$last_name."  Lớp : ".$classs['class_name']." - Ngành : ".$faculty_name." ".$course_name;?>
                            </p>
                        </div>
                        <div>
                            <h2 id="semester">
                                Kết quả đăng ký học tập của học kì <?php  echo $semester['semester_name']." năm học ".$semester['school_year'] ?>
                            </h2>
                        </div>

                    </div>

                        <div id="kq_dk" style="margin-top: 30px ; padding: 0px 40px; text-align: center; margin-bottom: 50px;">
                                    <h1 style=" font-size: 30px ; font-weight: bold; margin: 60px 0px 30px 0px;">Danh sách lớp học phần đã đăng ký</h1>

                                <table class='table list-table-wp' >
                                    <thead>
                                        <tr>                                                      
                                            <td><span class='thead-text'>STT</span></td>
                                            <td><span class='thead-text'>Lớp học phần</span></td>                                          
                                            <td><span class='thead-text'>Lịch học</span></td>   
                                            <td><span class='thead-text'>Phòng học</span></td>    
                                            <td><span class='thead-text'>Số TC</span></td>                     
                                            <td><span class='thead-text'>Ngày đăng ý</span></td>
                                        </tr>
                                    </thead>
                                
                                    <tbody id="danhsach_dk">    
                                        
                                        <?php
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

                                            $dem++
                                        ?>

                                            <tr >                                                      
                                                <td><span class='thead-text'><?php echo $dem ?></span></td>
                                                <td><span class='thead-text'><?php echo $class_name ?></span></td>
                                                
                                                <td><div class='thead-text'>
                                                    <p><?php echo "Từ ".date("d-m-Y", strtotime($date['start_date'])).' đến '.date("d-m-Y", strtotime($date['end_date'])) ?></p>   
                                                    <b><?php echo " Thứ ".$schedule['schedule_day']." Tiết ".$schedule['schedule_time'] ?></b> 
                                                </đ></td>  

                                                <td><span class='thead-text'><?php echo $classroom['room_name']." ".$classroom['building_name'] ?></span></td>
                                                
                                                <td><span class='thead-text'><?php echo $subject['subject_credit'] ?></span></td>
                                                
                                                <td><span class='thead-text'><?php echo date("d-m-Y", strtotime($thongtin['enrollmentDetail_date']))  ?></span></td>
                                            </tr>

                                        <?php
                                        }

                                        ?>
                                            <tr style="font-weight: bold;">                                                      
                                                <td><span class='thead-text'></span></td>
                                                <td><span class='thead-text'>Tổng</span></td>                                          
                                                <td><span class='thead-text'></span></td>   
                                                <td><span class='thead-text'></span></td>    
                                                <td><span class='thead-text'><?php echo $tongTC ?></span></td>                     
                                                <td><span class='thead-text'></span></td>
                                            </tr>

                                    </tbody>
                                        
                                </table>

                        </div>
                        

                    </div>
                   
                </div>
            </div>
            
        </div>

        <div id="kqdk_a">

        </div>
   
</div>
