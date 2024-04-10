
$(document).ready(function(){
     loadPage(1);
    // alert('ok');
    function loadPage(page) {
        $.ajax({
            url: '?mod=student&action=process',
            type: 'post',
            dataType : 'json',
            data: { page: page },
            success: function(data) {
               
                $('#list_student').empty();
                $('#list_student').html(data.list);

                $('#paging_wp').empty();
                $('#paging_wp').html(data.page);
            }
        });
    }
    
    
    $(document).on('click', '.pagination-link', function(){
        var page = $(this).data('page');
        loadPage(page);
    });
});