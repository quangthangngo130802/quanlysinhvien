$(document).ready(function(){
  
    $('#addsubject').submit(function(event){
        event.preventDefault();
        var subject_code =  $("#subject_code").val();
        var subject_name =  $("#subject_name").val();
        var subject_credit =  $("#subject_credit").val();
        var subject_major =  $("#subject_major").val();
        var subject_teacher =  $("#subject_teacher").val();
        var subject_semester =  $("#subject_semester").val();

        var data = {
            subject_code : subject_code,
            subject_name : subject_name,
            subject_credit : subject_credit,
            subject_major : subject_major,
            subject_teacher : subject_teacher,
            subject_semester : subject_semester
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
                    url: '?mod=subject&action=add_subject',
                    type: 'post',
                    dataType : 'text',
                    data: data,
                    success: function(response) {    
                       
                        if(response === 'success') {
                            swal("Hoàn thành!", "Thêm thành công !", "success");
                            setTimeout(function(){
                                window.location.href = '?mod=subject';
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