$(document).ready(function(){


    $('#student_faculty').change(function(){
  
        var faculty =  $(this).val();  

         $("#student_course").val(0);
        //  $("#student_class").val(0);
         $('#student_class').empty();
         var newOption = $('<option>', {
          value: '0',
          text: '--- Lớp ---'
      });
      
      // Thêm option mới vào dropdown
      $('#student_class').append(newOption);
         
        $('#student_course').change(function(){
        
          var course =  $(this).val();
          var data = {'faculty' : faculty, 'course' : course};

          $.ajax({
              url: '?mod=student&action=faculty',
              type: 'post',
              dataType : 'json',
              data: data,
              success: function(data) {   
                
                  $("#student_class").empty();
                  $('#student_class').append($('<option>', {
                      value: 0,
                      text: "Lớp"
                    }));
                  $.each(data, function(index, option) {
                      $('#student_class').append($('<option>', {
                        value: option.class_id,
                        text: option.class_name
                      }));
                    });
              }
          });
        })
        
    })
   
})