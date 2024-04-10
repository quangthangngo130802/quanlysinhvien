<?php get_header() ?>

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

                        <label for="class_name">Mã lớp</label>
                        <input type="text" name="class_code" id="class_code" value="<?php echo set_value('class_code') ?>">
                        <?php echo form_error('class_code') ?>

                        <label for="class_name">Tên lớp</label>
                        <input type="text" name="class_name" id="class_name" value="<?php echo set_value('class_name') ?>">
                        <?php echo form_error('class_name') ?>

                        <label for="faculty_class">Khoa</label>
                        <select name="faculty_class" id="faculty_class">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    foreach ($list_faculty as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['faculty_id'] ?>" <?php

                                            if(set_value('faculty_class') == $value['faculty_id'])
                                                echo "selected ='selected'";

                                        ?> > <?php echo $value['faculty_name'] ?></option>
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

                                            if(set_value('couse') == $value['course_id'])
                                                echo "selected ='selected'";

                                        ?> 
                                        >Khóa <?php echo $value['course_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                        <?php echo form_error('couse') ?>

                        <label for="teacher_class">Giảng viên</label>
                        <select name="teacher_class" id="teacher_class">
                                <option value="0">-- Chọn giảng viên --</option>
                                
                        </select>
                        <?php echo form_error('teacher_class') ?>

                        <button type="submit" name="add_class" id="btn-submit">Thêm mới</button>
                        <?php echo form_error('add_class') ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>