$(document).ready(function(){

    
    $('#form_dk').submit(function(event){

        
        event.preventDefault();
        var semester_id = $("#semester_id").val();
        var student_id = $("#student_id").val();
        var selected = $('input[name="option"]:checked').val();

        var selectedRadio = $('input[type="radio"]:checked');

        if(selectedRadio.length > 0){
            var row = selectedRadio.closest('tr');
            var slg = row.find('.tbody-text.slg').data('slg');
            var slgdk = row.find('.tbody-text.slgdk').data('slgdk');
            var subject_id = row.find('.tbody-text.subject').data('subject');
        }

        //  alert(student_id + "  --  " + subject_id + "  --  " + selected);

        data = {semester_id : semester_id ,student_id : student_id, selected : selected , slg : slg, slgdk : slgdk, subject_id : subject_id};
       
        $.ajax({
            url: '?mod=zzz_subject&action=dang_ky',
            type: 'post',
            dataType : 'text',
            data: data,
            success: function(data) {    

                if(data == "expire"){
                    alert("Hết hạn đăng ký");
                }else{
                    if(data == "success"){
                    
                        setTimeout(function() {
                            location.reload(); 
                        }, 1000);
                         alert("Đăng ký thành công !");
    
                    }else if(data == "full"){
    
                        alert("Lớp đã đầy xin hãy đăng ký lớp khác !");
    
                    }else if(data == "empty"){
    
                        alert("Đã đăng ký môn học này");
    
                    }else if(data == "fail"){
    
                        alert("Mời chọn lớp để đăng ký !");
                        
                    }else if(data == "update"){
    
                        setTimeout(function() {
                            location.reload(); 
                        }, 1000);
                         alert("Đổi lớp thành công !");
                         
                    }

                }
  
            }
        });
    })

})