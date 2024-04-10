$(document).ready(function(){
   
    $('#option_subject_a').change(function(){
        var subject  = $(this).val();
        data = {subject : subject};
       
        $.ajax({
            url: '?mod=zzz_subject&action=subject',
            type: 'post',
            dataType : 'json',
            data: data,
            success: function(data) {    

                $("#danhsach").html(data.subject);
                                           
                var a = " <button id='dang_ky' style='margin-top: 50px; float: right;'>Đăng ký</button>";
                
                $("#button").html(a);
                
            }
        });
    })
})