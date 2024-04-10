<?php get_header();
//show_array($subject);

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="public/js/a.subject/edit_subject.js"></script>
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
                    <form id="editsubject">

                        <input type="hidden" id="subject_id" value="<?php echo $subject['subject_id'] ?>">

                        <label for="subject_name_edit">Tên môn học</label>
                        <input type="text" name="subject_name_edit" id="subject_name_edit" value="<?php echo $subject['subject_name'] ?> ">

                        <label for="subject_credit_edit">Tín chỉ</label>
                        <input type="text" name="subject_credit_edit" id="subject_credit_edit" value=" <?php echo $subject['subject_credit'] ?> " >

                        <label for="subject_feaulty">Khoa</label>
                        <select name="subject_feaulty" id="subject_feaulty">
                                <option value="0">-- Chọn khoa --</option>
                                <?php
                                    $faculty = major_by_id($subject['major_id'])['faculty_id'];
                                  
                                    foreach ($list_faculty as $key => $value) {
                                 ?>

                                        <option value="<?php echo $value['faculty_id'] ?>"  <?php if($value['faculty_id'] == $faculty ) echo "selected='selected'"; ?>   > <?php echo $value['faculty_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>

                        <label for="subject_major_edit">Chuyên ngành</label>
                        <select name="subject_major_edit" id="subject_major_edit">
                                <option value="0">-- Chọn chuyên ngành --</option>
                                <?php
                                    foreach ($list_major as $key => $value) {
                                 ?>
                                 
                                        <option value="<?php echo $value['major_id'] ?>" <?php if($value['major_id'] == $subject['major_id'] ) echo " selected='selected' "; ?>  > <?php echo $value['major_name'] ?></option>
                                 <?php       
                                        # code...
                                    }
                                ?>
                        </select>
                                         
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>