
$(document).ready(function(){
     loadPage(1);

    function loadPage(page) {
        $.ajax({
            url: '?mod=class&action=process',
            type: 'post',
            dataType : 'json',
            data: { page: page },
            success: function(data) {
               
                $('#list_class').empty();
                $('#list_class').html(data.list);

                $('#paging_class').empty();
                $('#paging_class').html(data.page);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
             }
        });
    }
    
    
    $(document).on('click', '.pagination-link-class', function(){
        var page = $(this).data('page');
        loadPage(page);
    });
});