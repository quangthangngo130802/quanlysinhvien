$(document).ready(function(){

    $("#option_semester").change(function(){
        semester = $(this).val();

        $.ajax({
            url: '?mod=zzz_subject&action=semester',
            type: 'post',
            dataType : 'json',
            data: {semester: semester},
            success: function(data) { 

                // alert("Ok");
                
                $("#semester").empty();
                $('#semester').html(data.detail);
                
                $("#danhsach_dk").empty();
                $('#danhsach_dk').html(data.semester);
                
                
            }
        });
    })

})