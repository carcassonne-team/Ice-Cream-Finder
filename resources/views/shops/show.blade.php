@extends('layout.layout')

@section('content')
    <div class="container m-5 mx-auto">
        <div class="row main">
            <div class="col-lg-6 col-12 my-5 rcol">
                <h3 class="product text-center">SHOP DETAILS</h3>
                <div class="image text-center"><img src="https://static.turbosquid.com/Preview/2017/02/15__11_06_03/2.pngEE1C23C6-2483-409B-AD17-4A772BE5BC9AOriginal.jpg" width="300px" height="350px"></div>
                <p class="text-center my-3">Toilet paper is a tissue paper product primarily used to clean<br>the anus and surrounding area of feces after defecation,<br> and to clean the vulva and perineum of puppies</p>
            </div>
            <div class="col-lg-6 col-12 my-5 scol">
                <div class="row r3">
                    <h3 class="payment">SHOP DETAILS</h3>
                </div>
                <div class="row r6">
                    <div class="map">
                        @include('maps.map')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    body {
        background: #000;
        font-family: Arial, Helvetica, sans-serif
    }

    .map {
        width: 2vw;
        height: 2vh;
    }

    .container {
        background: #fff !important;
        border: none;
        border-radius: 20px
    }

    h6.text-muted {
        color: #6c757d85 !important
    }

    h4.text-danger {
        margin-left: 250px;
        color: #f11126 !important
    }

    .htwo {
        margin-left: 200px
    }

    .scol {
        padding-left: 60px
    }

    .row.r2 {
        margin-bottom: 20px
    }

    .row.r2:after {
        content: '.';
        font-size: 0;
        display: block;
        height: 1px;
        width: 77%;
        background: #a9abae3d
    }

    h3.payment {
        margin-top: 30px
    }

    h6.payment-method {
        margin-top: 30px
    }

    .r5.col-2 {
        padding-left: 0
    }

    div.col-2 {
        cursor: pointer
    }

    .personalDetails {
        margin-right: 100px;
        padding-top: 30px
    }

    .form-control {
        border: none;
        border-radius: none;
        border-bottom: 1px solid #a9abae3d
    }

    .form-control:focus {
        border: none;
        color: #000 !important;
        font-weight: bold;
        border-color: #fff;
        border-bottom: 1px solid #a9abae3d;
        outline: 0;
        box-shadow: 0 0 0 0 rgba(0, 123, 255, .25)
    }

    .far {
        color: #adb5bd
    }

    .th {
        margin-top: 10px
    }

    .btn.btn-primary {
        border: none;
        border-radius: 40px;
        width: 40%
    }

    @media screen and (max-width: 1200px) {
        .rcol {
            width: 100%
        }

        .scol {
            width: 100%
        }
    }

    @media screen and (max-width: 768px) {
        .container {
            width: 95%
        }

        .row.r2:after {
            width: 95%
        }
    }
</style>
