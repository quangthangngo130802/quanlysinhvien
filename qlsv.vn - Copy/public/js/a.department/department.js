$(document).ready(function(){
     loadPage(1);
    //   alert('ok');
    function loadPage(page) {
        $.ajax({
            url: '?mod=faculty&action=process',
            type: 'post',
            dataType : 'json',
            data: { page: page },
            success: function(data) {    
                $('#list_faculty').empty();
                $('#list_faculty').html(data.list);

                $('#paging_faculty').empty();
                $('#paging_faculty').html(data.page);
            }
        });
    }
    
    
    $(document).on('click', '.pagination-link-faculty', function(){
        var page = $(this).data('page');
        loadPage(page);
    });
});