
$(document).ready(function(){
    $('#code_student').keyup(function(){
        search(1); 
    });

    function search(page=1) {
        var searchInput = $('#code_student').val();
        $.ajax({
            url: '?mod=student&action=search',
            type: 'POST',
            dataType : 'JSON',
            data: {search: searchInput, page: page},
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

});


