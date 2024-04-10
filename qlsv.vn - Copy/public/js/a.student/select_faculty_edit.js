$(document).ready(function(){
  
    $('#student_department_edit').change(function(){
        var department =  $(this).val();  

         $("#student_course_edit").val(0);
         
        // alert($("#student_class").val());

        $('#student_course_edit').change(function(){
          //var department =  $("#student_department_edit").val();
          // $("#student_class_edit").val(0);
          var course =  $(this).val();
          
          var data = {'department' : department, 'course' : course};

          $.ajax({
              url: '?mod=student&action=department',
              type: 'post',
              dataType : 'json',
              data: data,
              success: function(data) {   
                
                  $("#student_class_edit").empty();
                  $('#student_class_edit').append($('<option>', {
                      value: 0,
                      text: "Lớp"
                    }));
                  $.each(data, function(index, option) {
                      $('#student_class_edit').append($('<option>', {
                        value: option.class_id,
                        text: option.class_name
                      }));
                    });
  
                 
              }
          });
        })
        
    })
   
})