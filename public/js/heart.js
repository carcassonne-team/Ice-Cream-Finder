// $(function () {
//     $(document).on('click', 'button.like', function () {
//         let i = $(this).text();
//         if ($(this).hasClass("far")) {
//             i++;
//             $(this).toggleClass("far fas")
//             $(this).html(" "+i)
//             doAJAX("/like", 54)
//         } else {
//             i--
//             $(this).html(" "+i)
//             $(this).toggleClass("fas far")
//         }
//     });
// });
//
// function doAJAX(url, id) {
//     console.log(id)
//     $.ajax({
//         url,
//         type: 'POST',
//         data: {
//             flavorId: id,
//         },
//         success: function (data) {
//             console.log(data);
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//         }
//     });
// }
