<?php get_header();
?>

<style>
    input[type="text"],
    select {
        width: 376px; 
        height: 35px;
        /* box-sizing: border-box;  */
        /* margin-bottom: 10px;  */
    }
</style>

<script src="public/js/a.class/select_faculty.js"></script>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">

                        <label for="class_code">Mã lớp</label>
                        <input type="text" name="class_code" id="class_code"
                         value="<?php echo $class['class_code']; ?>" readonly >
                         
                        

                        <label for="class_name">Tên lớp</label>
                        <input type="text" name="class_name" id="class_name"  value="<?php 
                            if(isset($_POST['edit_class'])) {
                                echo set_value('class_name');
                            }else{
                                echo $class['class_name'];
                            }
                             ?>" >
                             <?php echo form_error('class_name') ?>

                        <label for="faculty_class">Khoa</label>
                        <select name="faculty_class" id="faculty_class">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    foreach ($list_faculty as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['faculty_id'] ?>" 
                                        <?php 

                                            if(isset($_POST['edit_class'])) {
                                                if( $value['faculty_id'] == set_value('faculty_class') ) 
                                                echo "selected ='selected'"; 
                                            }else{
                                                if( $value['faculty_id'] == $class['faculty_id'] ) 
                                                echo "selected ='selected'"; 
                                            }

                                            
                                        ?>>                                           
                                            <?php echo $value['faculty_name'] ?> </option>
                                        <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('faculty_class') ?>

                        <label for="couse">Khóa</label>
                        <select name="couse" id="couse">
                                <option value="0">-- Chọn khóa --</option>
                                <?php
                                    foreach ($list_course as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['course_id'] ?>" 
                                        <?php 
                                            if(isset($_POST['edit_class'])) {
                                                if( $value['course_id'] == set_value('couse') ) 
                                                echo "selected ='selected'"; 
                                            }else{
                                                if( $value['course_id'] == $class['course_id'] ) 
                                                echo "selected ='selected'"; 
                                            }
                                        ?> >Khóa 
                                        <?php echo $value['course_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('couse') ?>

                        <label for="teacher_class">Giảng viên</label>
                        <select name="teacher_class" id="teacher_class">
                                <option value="0">-- Chọn giảng viên --</option>
                                <?php
                                $teacher_faculty = teacher_name_by_faculty($class['faculty_id']);
                                    foreach ($teacher_faculty as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['teacher_id'] ?>" 
                                        <?php 
                                            if(isset($_POST['edit_class'])) {
                                                if( $value['teacher_id'] == set_value('teacher_class') ) 
                                                echo "selected ='selected'"; 
                                            }else{
                                                if( $value['teacher_id'] == $class['teacher_id'] ) 
                                                echo "selected ='selected'"; 
                                            }
                                        ?> >
                                        <?php echo $value['teacher_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                                
                        </select>
                        <?php echo form_error('teacher_class') ?>
                          

                        <button type="submit" name="edit_class" id="btn-submit">Sửa thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>