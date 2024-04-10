
$(document).ready(function(){
     loadPage(1);
     
    function loadPage(page) {
        $.ajax({
            url: '?mod=subject&action=process',
            type: 'post',
            dataType : 'json',
            data: { page: page },
            success: function(data) {
               
                $('#list_subject').empty();
                $('#list_subject').html(data.list);

                $('#paging_subject').empty();
                $('#paging_subject').html(data.page);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
             }
        });
    }
    
    
    $(document).on('click', '.pagination-link-subject', function(){
        var page = $(this).data('page');
        loadPage(page);
    });
});