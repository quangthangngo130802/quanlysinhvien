<?php get_header() ?>

<style>
    input[type="text"],
    select {
        width: 376px; 
        height: 35px;
  
    }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="public/js/a.department/add_department.js"></script>
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
                    <form id="addProductForm">
                        <label for="department_code">Mã khoa</label>
                        <input type="text" name="faculty_code" id="faculty_code">

                        <label for="department_name">Tên khoa</label>
                        <input type="text" name="faculty_name" id="faculty_name">

                        
                        <button type="submit" name="add_faculty" id="add_faculty">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>