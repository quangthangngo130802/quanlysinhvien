<?php get_header() ?>

<style>
    input[type="text"],
    select {
        width: 376px; 
        height: 35px;
  
    }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="public/js/a.department/edit_department.js"></script>
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
                    <form id="editProductForm">
                        <label for="faculty_code_edit">Mã khoa</label>
                        <input type="text" style="background-color:#dedede;" name="faculty_code_edit" id="faculty_code_edit" value="<?php echo $faculty['faculty_code'] ?> ">

                        <label for="faculty_name_edit">Tên khoa</label>
                        <input type="text" name="faculty_name_edit" id="faculty_name_edit" value="<?php echo $faculty['faculty_name'] ?> ">
          
                        <input type="hidden" id="faculty_id_edit"  value="<?php echo $faculty['faculty_id'] ?> " >

                        <button type="submit" name="edit_faculty" id="edit_faculty">Xác nhận sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>