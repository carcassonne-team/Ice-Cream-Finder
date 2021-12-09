<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new flavor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="flavorName" class="form-label">Flavor Name</label>
                        <input type="email" class="form-control" id="flavorName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addFlavorSubmit">Add flavor</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
    <script>
        $(document).ready(function () {
            $('#addFlavorSubmit').click((e) => {
                // e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{route('add.flavor')}}',
                    data: {
                        flavorName: $('#flavorName').val(),
                    },
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseJSON.message)
                    }
                });
            })
        });
    </script>
@endsection
