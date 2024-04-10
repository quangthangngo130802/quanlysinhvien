<?php  get_header('user') ?>
<style>
   
</style>
<script src="public/js/a.subject/subject.js"></script>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right" style="padding: 20px 8px;">
            <div class="section" id="title-page">
                
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <h1>Thông báo mới nhất</h1>

                    <?php 
                        show_array(student($_SESSION['student_id']));
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
