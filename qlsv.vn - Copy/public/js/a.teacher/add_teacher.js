$(document).ready(function(){
  
    $('#addteacher').submit(function(event){
        event.preventDefault();
        var teacher_name =  $("#teacher_name").val();
        var teacher_email =  $("#teacher_email").val();
        var teacher_address =  $("#teacher_address").val();
        var teacher_phone =  $("#teacher_phone").val();
        var teacher_birth =  $("#teacher_birth").val();
        
        var gender_teacher =  $("#gender_teacher").val();
        var teacher_department =  $("#teacher_department").val();
        var chucvu =  $("#chucvu").val();
        var education =  $("#education").val();

        // alert("ok thêm teacher");

        var data = {
            teacher_name : teacher_name,
            teacher_email : teacher_email,
            teacher_address : teacher_address,
            teacher_phone : teacher_phone,
            teacher_birth : teacher_birth,
            gender_teacher : gender_teacher,
            teacher_department : teacher_department,
            chucvu : chucvu,
            education : education
            };
        swal({
            title: "Bạn có chắc muốn thêm không?",
           
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?mod=teacher&action=add_teacher',
                    type: 'post',
                    dataType : 'text',
                    data: data,
                    success: function(response) {    
                       
                        if(response === 'success') {
                            swal("Hoàn thành!", "Thêm thành công !", "success");
                            setTimeout(function(){
                                window.location.href = '?mod=teacher';
                            }, 2000);             
                        }else{
                            swal("Thất bại!", "Thêm thất bại !", "error");
                        }         
                    }
                });
            } else {
              swal("Đã hủy không thêm !");
            }
          });
    })
   
})