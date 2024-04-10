
$(document).ready(function(){
 
    $(document).on('click', '.delete_faculty', function(){
        var faculty_id = $(this).parent().attr('data-id');
        var row_element = $(this).closest('tr');
     
         swal({
            title: "Bạn có chắc muốn xóa không?",
             text: "Xóa, Bạn sẽ không thể khôi phục lại !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?mod=faculty&action=delete',
                    type: 'POST',
                    data: {faculty_id: faculty_id},
                    success: function(response) {
                       
                        if(response === 'success') {
                          swal("Hoàn thành!", "Xóa thành công sinh viên !", "success");
                          
                          setTimeout(function(){
                            window.location.href = '?mod=faculty';
                          }, 2000); 
                         
                        }else{
                            swal("Thất bại!", "Xóa không thành công !", "error");
                        }
                    }
                });
            } else {
              swal("Đã hủy hông xóa!");
            }
          });

    })
});





// <!DOCTYPE html>
// <html lang="en">
// <head>
// <meta charset="UTF-8">
// <meta name="viewport" content="width=device-width, initial-scale=1.0">
// <title>Phân Trang và Xóa Phần Tử Cuối Cùng</title>
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
// </head>
// <body>
// <div id="data">
//     <!-- Danh sách các phần tử sẽ được hiển thị ở đây -->
// </div>
// <div id="pagination">
//     <!-- Các nút phân trang sẽ được hiển thị ở đây -->
// </div>
// <button id="deleteButton">Xóa Phần Tử Cuối Cùng</button>

// <script>
// $(document).ready(function() {
//     // Hàm lấy dữ liệu
//     function fetchData(page) {
//         $.ajax({
//             url: 'fetch_data.php',
//             type: 'post',
//             data: { page: page },
//             success: function(response) {
//                 $('#data').html(response);
//             }
//         });
//     }

//     // Hàm phân trang
//     function paginate(page) {
//         $.ajax({
//             url: 'pagination.php',
//             type: 'post',
//             data: { page: page },
//             success: function(response) {
//                 $('#pagination').html(response);
//             }
//         });
//     }

//     // Load dữ liệu và phân trang khi trang được tải
//     fetchData(1);
//     paginate(1);

//     // Xử lý sự kiện click nút phân trang
//     $(document).on('click', '.pagination_link', function() {
//         var page = $(this).attr('id');
//         fetchData(page);
//         paginate(page);
//     });

//     // Xử lý sự kiện click nút xóa phần tử cuối cùng
//     $('#deleteButton').click(function() {
//         $.ajax({
//             url: 'delete_last_item.php',
//             type: 'get',
//             success: function(response) {
//                 if (response == 'success') {
//                     // Lấy trang hiện tại
//                     var currentPage = parseInt($('.active').attr('id'));

//                     // Nếu trang hiện tại không phải là trang đầu tiên
//                     if (currentPage > 1) {
//                         // Cập nhật lại trang hiện tại và tải dữ liệu mới
//                         fetchData(currentPage - 1);
//                         paginate(currentPage - 1);
//                     } else {
//                         // Nếu trang hiện tại là trang đầu tiên, tải lại trang đầu tiên
//                         fetchData(1);
//                         paginate(1);
//                     }
//                 } else {
//                     alert('Xóa không thành công!');
//                 }
//             }
//         });
//     });
// });
// </script>
// </body>
// </html>

     