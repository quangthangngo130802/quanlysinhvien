$(document).ready(function(){

    $('#editsubject').submit(function(event){
        event.preventDefault();
        var subject_name =  $("#subject_name_edit").val();
        var subject_credit =  $("#subject_credit_edit").val();
        var subject_major =  $("#subject_major_edit").val();
       
        var subject_id = $("#subject_id").val();
       
        var data = {
            subject_name : subject_name,
            subject_credit : subject_credit,
            subject_major : subject_major,
            subject_id : subject_id
            };
        swal({
            title: "Bạn có chắc muốn sửa không?",
           
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?mod=subject&action=edit_subject',
                    type: 'post',
                    dataType : 'text',
                    data: data,
                    success: function(response) {    
                       
                        if(response === 'success') {
                            swal("Hoàn thành!", "Thêm thành công !", "success");
                            setTimeout(function(){
                                window.location.href = '?mod=subject&action=edit&id='+ subject_id;
                            }, 2000);             
                        }else{
                            swal("Thất bại!", "Thêm thất bại !", "error");
                        }         
                    }
                });
            } else {
              swal("Đã hủy không sửa !");
            }
          });
    })
   
})