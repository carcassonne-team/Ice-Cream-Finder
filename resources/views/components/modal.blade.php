<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="alert alert-success flavorAlert" role="alert"></div>
                <div class="alert alert-danger flavorAlertDanger" role="alert"></div>
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new flavor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="flavorName" class="form-label">Flavor Name</label>
                        <input type="text" class="form-control" id="flavorName" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addFlavorSubmit">Add flavor</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script src="{{asset('js/heart.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#addFlavorSubmit').click((e) => {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{route('add.flavor')}}',
                    data: {
                        name: $('#flavorName').val(),
                        shopId: {{$shopId}},
                    },
                    success: function (data) {
                        $('.flavorAlert').fadeIn().css("display", "block");
                        $('.flavorAlert').html(data.success)
                        $('#flavorName').val('');
                        location.replace('{{route('shops.id', $shopId)}}');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('.flavorAlertDanger').fadeIn().css("display", "block")
                        $('.flavorAlertDanger').html(jqXHR.responseJSON.message);
                        console.log(jqXHR.responseJSON.message)
                    }
                });
                    $('.flavorAlert').fadeIn().css("display", "none");
                    $('.flavorAlertDanger').fadeIn().css("display", "none")
            })

            $(function () {
                $(document).on('click', 'button.like', function () {
                    let flavorId = $(this).attr('data-id');

                    let i = $(this).text();
                    if ($(this).hasClass("far")) {
                        i++;
                        $(this).toggleClass("far fas")
                        $(this).html(" "+i)
                        doAJAX("{{route('like.flavor')}}", flavorId)
                    } else {
                        i--
                        $(this).html(" "+i)
                        $(this).toggleClass("fas far")
                        doAJAX("{{route('unlike.flavor')}}", flavorId)
                    }
                });
            });

            function doAJAX(url, id) {
                $.ajax({
                    url,
                    type: 'POST',
                    data: {
                        id: id,
                    }
                });
            }
        });
    </script>
@endsection

<style>
    .flavorAlert, .flavorAlertDanger {
        display: none;
    }
</style>
