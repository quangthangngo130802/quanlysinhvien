
$(document).ready(function(){
     loadPage(1);
    
    function loadPage(page) {
        $.ajax({
            url: '?mod=teacher&action=process',
            type: 'post',
            dataType : 'json',
            data: { page: page },
            success: function(data) {
               
                $('#list_teacher').empty();
                $('#list_teacher').html(data.list);

                $('#paging_teacher').empty();
                $('#paging_teacher').html(data.page);
            }
        });
    }
    
    
    $(document).on('click', '.pagination-link-teacher', function(){
        var page = $(this).data('page');
        loadPage(page);
    });
});