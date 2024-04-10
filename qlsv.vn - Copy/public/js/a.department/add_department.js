$(document).ready(function(){
    //alert("ok");
    $('#addProductForm').submit(function(event){
        event.preventDefault();
        var faculty_code =  $("#faculty_code").val();
        var faculty_name =  $("#faculty_name").val();

        var data = {faculty_code : faculty_code, faculty_name : faculty_name};
        swal({
            title: "Bạn có chắc muốn thêm không?",
           
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?mod=faculty&action=add_faculty',
                    type: 'post',
                    dataType : 'text',
                    data: data,
                    success: function(response) {    
                       
                        if(response === 'success') {
                            swal("Hoàn thành!", "Thêm thành công !", "success");
                            setTimeout(function(){
                                window.location.href = '?mod=faculty';
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