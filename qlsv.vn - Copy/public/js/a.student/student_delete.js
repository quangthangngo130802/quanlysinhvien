
$(document).ready(function(){
   
   
    $(document).on('click', '.delete_student', function(){
        var student_id = $(this).parent().attr('data-id');
        var row_element = $(this).closest('tr');
        if(confirm("Bạn có chắc muốn xóa hay không ?")){
            $.ajax({
                url: '?mod=student&action=delete',
                type: 'POST',
                data: {student_id: student_id},
                success: function(response) {
                    // Xóa sinh viên khỏi giao diện nếu thành công
                    if(response === 'success') {
                       alert("Xóa thành công !");
                       row_element.remove();                       
                    }else{
                        alert("Xóa thất bại vui long kiểm tra lại !");
                    }
                    // alert(response);
                   
                    
                }
            });
        }
        
    })
});
     