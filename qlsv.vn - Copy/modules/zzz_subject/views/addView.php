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

    $row = array();

    foreach ($list_major as $key => $value) {
        # code...

        $row[] = $value['major_id'];
    }
    // show_array($row);

    $date = date("Y-m-d") ;

    $hien_tai = strtotime($date);
    $start = strtotime($semester['start']);
    $end = strtotime($semester['end']);

    if($hien_tai <= $start || $end <= $hien_tai){
        echo " <script>
        alert('Đã hết hạn đăng ký học !');
        </script>";
        
    }
   
?>
<style>
   
   
</style>
<link rel="stylesheet" href="public/css/dang_ky_hoc.css">
<script src="public/js/a.subject/subject.js"></script>
<script src="public/js/a.user_subject/class_subject.js"></script>
<script src="public/js/a.user_subject/dangky.js"></script>
<script src="public/js/a.user_subject/delete.js"></script>
<div id="main-content-wp" class="list-product-page">
    
      
        <div id="content" class="fl-right" style="padding: 0px;">
            <div class="section" id="title-page">
                
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <h1 id="tieude" style="text-align: center;">Đăng ký môn học</h1>

                    <div id="thongbao" >

                        <div id="thongbao1" class="dp_flex">

                            <div style="padding-right: 200px ;">
                                <div> Số TC tối thiểu cần ĐK :   <span class="aa">0</span>  </div>
                                <div> Hạn chế số SV tối đa  :    <span class="aa">Có</span> </div>
                            </div>

                            <div style="margin-right: 90px;">
                                <div> Số TC tối đa được phép ĐK : <span class="aa">Không hạn chế</span> </div>
                                <div> Cho phép đ.ký ngoài ngành   : <span class="aa">0</span>  </div>
                            </div>

                            <div>
                              
                                <div> Hạn đăng ký  : <span class="aa"><?php echo date("d-m-Y", strtotime($semester['start'])) .' -> '.date("d-m-Y", strtotime($semester['end'])) ?></span>  </div>
                            </div>

                        </div>

                        <div id="thongbao2" class="dp_flex">
                            <div style="padding-right: 264px ;">
                                Khóa : 
                                <select name="" id="">
                                    <option value=""><?php echo $course_name ?></option>
                                </select>
                            </div>

                            <div>
                                Ngành : 
                                <select name="" id="">
                                    <option value=""><?php echo $faculty_name ?></option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div id="detail_student">

                        <div>
                            <p id="news">
                                <?php echo $student['student_code']." - ".$first_name." ".$last_name."  Lớp : ".$classs['class_name']." - Ngành : ".$faculty_name." ".$course_name;?>
                            </p>
                        </div>
                        <div>
                            <h2 id="semester">
                                Danh sách học phần có thể đăng ký học kì <?php  echo $semester['semester_name']." năm học ".$semester['school_year'] ?>
                            </h2>
                        </div>

                    </div>

                    <div class="list_subject" >

                        <div style="padding: 10px 20px !important;">
                            <label for="option_subject">Môn học</label>
                            <select name="option_subject" id="option_subject_a">
                                <option value="0">--- Chọn môn học ---</option>
                                <?php

                                    foreach ($list_subject as $key => $value) {

                                        foreach ($row as $key => $major) {
                                          
                                            if($value['major_id'] == $major){
                                              
                                ?>

                                <option value="<?php echo $value['subject_id'] ?>"> <?php echo $value['subject_name'] ?> </option>

                                <?php                
                                            }
                                        }

                                    }
                                ?>
                            </select>

                        </div>

                        <div id="ketqua" style="margin-top: 30px ; padding: 0px 40px; text-align: center;">
                            <form action="" method="post" id="form_dk">
                                <input type="hidden" value="<?php echo $student['student_id'] ?>" id="student_id">
                                <input type="hidden" value="<?php echo $semester['semester_id'] ?>" id="semester_id">
                                <table class='table list-table-wp' >
                                    <thead>
                                        <tr>
                                            <td><span class='thead-text'>Chọn </span></td>                    
                                            <td><span class='thead-text'>Mã lớp học phần</span></td>
                                            <td><span class='thead-text'>Lớp học phần</span></td>
                                            <td><span class='thead-text'>Môn học</span></td>
                                            <td><span class='thead-text'>Tín chỉ</span></td>
                                            <td><span class='thead-text'>Sĩ số</span></td>
                                            <td><span class='thead-text'>Số lương ĐK</span></td>
                                            <td><span class='thead-text'>Trạng thái</span></td>
                                        </tr>
                                    </thead>
                                
                                    <tbody id="danhsach">        

                                    </tbody>
                                        
                                </table>

                                <div id="button"> </div>
                            </form>
                        </div>

                        <div id="kq_dk" style="margin-top: 30px ; padding: 0px 40px; text-align: center; margin-bottom: 50px;">
                                    <h1 style=" font-size: 30px ; font-weight: bold; margin: 60px 0px 30px 0px;">Danh sách lớp học phần đã đăng ký</h1>
                            <form action="" method="post" id="form_huy">
                                <input type="hidden" value="<?php echo $student['student_id'] ?>" id="student_id_delete">
                                <input type="hidden" value="<?php echo $semester['semester_id'] ?>" id="semester_id_delete">
                                <table class='table list-table-wp' >
                                    <thead>
                                        <tr>      
                                            <td><span class='thead-text'>Hủy</span></td>                                                
                                            <td><span class='thead-text'>STT</span></td>
                                            <td><span class='thead-text'>Lớp học phần</span></td>                                          
                                            <td><span class='thead-text'>Lịch học</span></td>   
                                            <td><span class='thead-text'>Phòng học</span></td>    
                                            <td><span class='thead-text'>Số TC</span></td>                     
                                            <td><span class='thead-text'>Ngày đăng ý</span></td>
                                        </tr>
                                    </thead>
                                
                                    <tbody id="danhsach">    
                                        
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
                                            <td><input type="checkbox" name="" id=""value = <?php echo $class['class_section_id'] ?> ></td>                                             
                                            <td><span class='thead-text'><?php echo $dem ?></span></td>
                                            <td><span class='thead-text'><?php echo $class_name ?></span></td>
                                            
                                            <td><div class='thead-text'>
                                                <p><?php echo "Từ ".date("d-m-Y", strtotime($date['start_date'])).' đến '.date("d-m-Y", strtotime($date['end_date'])) ?></p>   
                                                <b><?php echo " Thứ ".$schedule['schedule_day']." Tiết ".$schedule['schedule_time'] ?></b> 
                                            </đ></td>                           
                                            <td><span class='thead-text'><?php echo $classroom['room_name']." ".$classroom['building_name'] ?></span></td>
                                            <td><span data-subjectId = '<?php echo $subject['subject_id'] ?>' class='thead-text subjectId'><?php echo $subject['subject_credit'] ?></span></td>
                                            <td><span class='thead-text'><?php echo date("d-m-Y", strtotime($thongtin['enrollmentDetail_date']))  ?></span></td>
                                        </tr>

                                    <?php
                                    }

                                    ?>
                                        <tr style="font-weight: bold;">                                                      
                                            <td><span class='thead-text'>
                                                <?php
                                                    $date = date("Y-m-d") ;
                                                     $hien_tai = strtotime($date);
                                                     $start = strtotime($semester['start']);
                                                     $end = strtotime($semester['end']);
                                                 
                                                     if($hien_tai >= $start && $end >= $hien_tai){    
                                                ?>
                                                        <button>Hủy</button>
                                                <?php
                                                     }
                                                ?>
                                            </span></td>
                                            <td><span class='thead-text'>Tổng</span></td>                                          
                                            <td><span class='thead-text'></span></td>   
                                            <td><span class='thead-text'></span></td>   
                                            <td><span class='thead-text'></span></td>    
                                            <td><span class='thead-text'><?php echo $tongTC ?></span></td>                     
                                            <td><span class='thead-text'></span></td>
                                        </tr>

                                    </tbody>
                                        
                                </table>

                            </form>
                            
                        </div>

                    </div>
                   
                </div>

            </div>
            
        </div>


        
   
</div>
