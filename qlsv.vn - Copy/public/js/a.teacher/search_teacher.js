
$(document).ready(function(){
    $('#teacher_search').keyup(function(){
        search(1); 
    });

    function search(page=1) {
        var searchInput = $('#teacher_search').val();
        $.ajax({
            url: '?mod=teacher&action=search',
            type: 'POST',
            dataType : 'JSON',
            data: {search: searchInput, page: page},
            success: function(data) {
                $('#list_teacher').empty();
                $('#list_teacher').html(data.search);
        
                $('#paging_teacher').empty();
                $('#paging_teacher').html(data.page_search);
            }
        });
    }

    $(document).on('click', '.pagination-link-search-teacher', function(){
        var page = $(this).data('page');
        search(page);
    });

});


