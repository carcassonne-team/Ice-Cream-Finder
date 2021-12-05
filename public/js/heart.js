$(function () {
    $(document).on('click', 'button.like', function () {
        let i = $(this).text();
        if ($(this).hasClass("far")) {
            i++;
            $(this).toggleClass("far fas")
            $(this).html(" "+i)
            doAJAX("https://reqbin.com/echo/post/json", this.id)
        } else {
            i--
            $(this).html(" "+i)
            $(this).toggleClass("fas far")
        }
    });
});

function doAJAX(url, id) {
    $.ajax({
        url,
        type: 'POST',
        data: {
            id: id,
        },
        success: function (data) {
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
}
