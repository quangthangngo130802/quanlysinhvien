$(document).ready(function(){
    
    $('#student_department').change(function(){
        var department =  $("#student_department").val();
        var data = {'department' : department};

        $.ajax({
            url: '?mod=student&action=department',
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

                // alert(data.department);
            }
        });
    })
   
})