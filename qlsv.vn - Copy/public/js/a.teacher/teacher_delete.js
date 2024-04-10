
$(document).ready(function(){
   
    $(document).on('click', '.delete_teacher', function(){
       
        var row_element = $(this).closest('tr');
        
         swal({
            title: "Bạn có chắc muốn xóa không?",
             text: "Xóa, Bạn sẽ không thể khôi phục lại !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?mod=teacher&action=delete',
                    type: 'POST',
                    data: {teacher_id: teacher_id},
                    success: function(response) {
                        // Xóa sinh viên khỏi giao diện nếu thành công
                        if(response === 'success') {
                            swal("Hoàn thành!", "Xóa thành công sinh viên !", "success");
                           row_element.remove();                       
                        }else{
                            swal("Thất bại!", "Xóa không thành công !", "error");
                        }
                    }
                });
            } else {
              swal("Đã hủy hông xóa!");
            }
          });

        
        
    })
});
     