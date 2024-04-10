$(document).ready(function(){
    $("#form_student").submit(function(event){
        event.preventDefault();

        var student_faculty = $("#student_faculty").val();
        var student_course = $("#student_course").val();
        var student_class = $("#student_class").val();
        var code_student = $("#code_student").val();

        
        search(1);
    })


    function search(page = 1) {
        var student_faculty = $("#student_faculty").val();
        var student_course = $("#student_course").val();
        var student_class = $("#student_class").val();
        var code_student = $("#code_student").val();
        
        data = {
            student_faculty : student_faculty, 
            student_course : student_course,
            student_class : student_class,
            code_student : code_student,
            page: page
         }

        $.ajax({
            url: '?mod=student&action=timkiem',
            type: 'post',
            dataType : 'json',
            data: data,
            success: function(data) {   
              
                $('#list_student').empty();
                $('#list_student').html(data.search);
        
                $('#paging_wp').empty();
                $('#paging_wp').html(data.page_search);
               
            }
        });

    }

    $(document).on('click', '.pagination-link-search', function(){
        var page = $(this).data('page');
        search(page);
    });

    

    


})