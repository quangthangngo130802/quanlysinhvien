$(document).ready(function(){
    
    $('#faculty_class').change(function(){
        var faculty =  $("#faculty_class").val();
        var data = {'faculty' : faculty};

        $.ajax({
            url: '?mod=class&action=teacher_faculty',
            type: 'post',
            dataType : 'json',
            data: data,
            success: function(data) {    
                $("#teacher_class").empty();
                $('#teacher_class').append($('<option>', {
                    value: 0,
                    text: "Giảng viên"
                  }));
                $.each(data, function(index, option) {
                    $('#teacher_class').append($('<option>', {
                      value: option.teacher_id,
                      text: option.teacher_name
                    }));
                  });

                // alert(data.faculty);
            }
        });
    })
   
})