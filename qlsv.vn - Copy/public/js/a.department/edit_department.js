$(document).ready(function(){
  
    $('#editProductForm').submit(function(event){
        event.preventDefault();
       
        var faculty_name =  $("#faculty_name_edit").val();
        var faculty_code =  $("#faculty_code_edit").val();
        var faculty_id =    $("#faculty_id_edit").val();

        var data = {faculty_name : faculty_name, faculty_code : faculty_code, faculty_id : faculty_id};
        swal({
            title: "Bạn có chắc muốn sửa không?",
           
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?mod=faculty&action=edit_faculty',
                    type: 'post',
                    dataType : 'text',
                    data: data,
                    success: function(response) {    
                       
                        if(response == 'success') {
                            swal("Hoàn thành!", "Sửa thành công !", "success");
                            setTimeout(function(){
                                window.location.href = '?mod=faculty&action=edit&id=' + faculty_id;
                            }, 2000);             
                        }else{
                            swal("Thất bại!", "sửa thất bại !", "error");
                        }         
                    }
                });
            } else {
              swal("Đã hủy không sửa !");
            }
          });
    })
   
})