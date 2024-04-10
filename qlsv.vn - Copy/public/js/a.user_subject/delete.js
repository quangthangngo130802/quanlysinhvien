$(document).ready(function(){

    $('#form_huy').submit(function(event){

        event.preventDefault();
        var semester_id = $("#semester_id_delete").val();

        var student_id = $("#student_id_delete").val();
        
        var checkedValues = $('#form_huy input[type="checkbox"]:checked').map(function(){
            return $(this).val();
        }).get();

        var dataIds = [];
        $('input[type="checkbox"]:checked').each(function() {
            var subjectId = $(this).closest('tr').find('.thead-text.subjectId').data('subjectid');
            dataIds.push(subjectId);
        });

        $.ajax({
            url: '?mod=zzz_subject&action=delete',
            type: 'post',
            dataType : 'text',
            data: {checkboxValues: checkedValues, dataIds : dataIds, semester_id : semester_id, student_id : student_id},
            success: function(data) {    
                
                
                if(data == 'seccess'){
                    setTimeout(function() {
                        location.reload(); 
                    }, 1000);
                     alert("Hủy thành công !");
                }
            }
        });

    })

})