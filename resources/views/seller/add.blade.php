@extends('layout.layout')

@section('content')
    <div class="container contact">
        <div class="row">
            <div class="alert alert-success addShopAlert" role="alert"></div>
            <div class="alert alert-danger addShopAlertDanger" role="alert"></div>
            <div class="col-md-3">
                <div class="contact-info">
                    <img
                        src="https://is1-ssl.mzstatic.com/image/thumb/Purple71/v4/98/e7/77/98e777f4-94ff-1c8e-54f2-d1cc8642633e/source/256x256bb.jpg"
                        width="100vw" height="100vh" alt="image" class="img-fluid rounded mx-auto d-block"/>
                    <h2 class="d-flex justify-content-center">Add your shop</h2>
                </div>
            </div>
            <div class="col-md-9">
                <div class="contact-form">
                    <form id="form-add" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname">Shop Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname" placeholder="Enter Shop Name"
                                       name="sname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="photo">Godziny otwarcia:</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="open_from" name="open_from">
                                <input type="time" class="form-control" id="open_to" name="open_to">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="photo">Photo:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="photo">Map:</label>
                                @include('maps.map')
                        </div>
                        <div class="form-group pt-5">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-default submitBtn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let lat = 0;
        let lng = 0;
        $('#form-add').submit((e) => {
            e.preventDefault()
            let $sName = $('#fname').val()
            let $sPhoto = $('#photo').val();
            let $sOpenFrom = $('#open_from').val()
            let $sOpenTo = $('#open_to').val()
            const data = {
                name: $sName,
                photo: $sPhoto,
                map: {
                    lat,
                    lng
                }
            }
            if(data.name !== "" && data.map.lat !== 0){
                $.ajax({
                    type: 'POST',
                    url: '{{route('add.shop')}}',
                    data: {
                        name: $sName,
                        image: $sPhoto,
                        open_from: $sOpenFrom,
                        open_to: $sOpenTo,
                        lat: lat,
                        lng: lng,
                    },
                    success: function (data) {
                        $('.addShopAlert').fadeIn().css("display", "block")
                        $('.addShopAlert').html(data);
                        window.location.replace("{{route('shops.my')}}");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        showError(jqXHR.responseJSON.message)
                        scrollUp();
                    }
                });
            }else {
                showError("Wyprowadź wszystkie dane")
                scrollUp();
            }
        })

        function showError(text){
            $('.addShopAlertDanger').fadeIn().css("display", "block")
            $('.addShopAlertDanger').html(text);
        }

        function scrollUp(){
            $("html, body").animate({
                scrollTop: 0
            }, 1);
        }
    </script>
@endsection

<style>
    body {
        background-color: #25274d;
    }
    .contact {
        padding: 4%;
        height: 400px;
    }
    .addShopAlert, .addShopAlertDanger {
        display: none;
    }
    .col-md-3 {
        background: rgb(255, 255, 255);
        padding: 4%;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }
    .contact-info {
        margin-top: 10%;
    }
    .contact-info img {
        margin-bottom: 15%;
    }
    .contact-info h2 {
        margin-bottom: 10%;
    }
    .col-md-9 {
        background: #fff;
        padding: 3%;
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }
    .contact-form label {
        font-weight: 600;
    }
    .contact-form button {
        background: #25274d;
        color: #fff;
        font-weight: 600;
        width: 25%;
    }
    .contact-form button:focus {
        box-shadow: none;
    }
</style>
