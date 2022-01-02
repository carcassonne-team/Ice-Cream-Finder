@extends('layout.layout')

@section('content')
    <div class="container mx-auto">
        <div class="row main ">
            <div class="col-lg-6 col-12 my-5 rcol">
                <h3 class="product text-center">{{$shop->name}}</h3>
                <div class="image text-center"><img
                        src="https://static.turbosquid.com/Preview/2017/02/15__11_06_03/2.pngEE1C23C6-2483-409B-AD17-4A772BE5BC9AOriginal.jpg"
                        width="300px" height="350px" class="img-fluid"></div>
                <p class="text-center my-3">
                </p>
            </div>
            <div class="col-lg-6 col-12 my-5 scol">
                <div class="row r6">
                    <div class="row r3">
                        <h3 class="payment d-flex justify-content-center">Dostępne lody:</h3>
                        <div class="">
                            <ul class="list-group d-flex justify-content-center">
                                @foreach($iceCreams as $iceCream)
                                    <li class="list-group-item d-flex justify-content-between heart">{{\App\Models\Flavor::query()->where('id', $iceCream->flavor_id)->value('name')}}
                                        <button class="like btn btn-primary far fa-heart"> 0</button>
                                    </li>
                                @endforeach
                            </ul>
                            @auth
                                @if (\Illuminate\Support\Facades\Auth::user()->id == $shop->user_id)
                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                        Dodaj smak
                                    </button>
                                @endif
                            @endauth
                        </div>
                    </div>
                    <div class="">
                        <x-modal shopId="{{$shop->id}}"></x-modal>
                    </div>

                    <div class="map pt-3 pb-sm-5 row d-flex justify-content-center img-fluid">
                        <x-map lat="{{$location->lat}}" lng="{{$location->lng}}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-sm-5">
        <div class="col-12">
            <div class="shadow p-3 bg-white rounded">
                @auth
                    <div class="d-flex flex-row">
                        <div class="w-100 ml-2 comment-area">
                            <h1 class="d-flex justify-content-center">Komentarze:</h1>
                            <br>
                            <p>Napisz swój komentarz:</p>
                            <textarea class="form-control"></textarea>
                            <div class="d-flex align-items-end flex-column bd-highlight mb-3">
                                <button class="btn btn-secondary btn-block mt-2 post-btn">Post</button>
                            </div>
                        </div>
                    </div>
                @endauth
                <div class="d-flex flex-row mt-4">
                    <div class="ml-2 w-100">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <span class="font-weight-bold name">Mark Hamilton</span>
                            </div>
                        </div>
                        <p class="user-comment-text text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                        <div class="mt-3 d-flex align-items-center"><span
                                class="dots"></span> <span class="fs-13">100 likes</span> <span class="dots"></span>
                            <span> <i class="fa fa-thumbs-up"></i> <i class="fa fa-thumbs-down"></i> </span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    body {
        background: #000;
        font-family: Arial, Helvetica, sans-serif;
        min-height: 50vh;
    }

    .map {
        max-width: 30vw;
        height: 2vh;
    }

    .main {
        min-height: 50vh;
    }

    .heart {
        cursor: pointer;
    }

    .container {
        background: #fff !important;
        border: none;
        border-radius: 20px;
        min-height: 50vh;
    }

    .form-control {
        width: 100%;
        height: 140px;
        resize: none;
        border: 2px solid #eee
    }

    .form-control:focus {
        box-shadow: none
    }

    .form-control:focus .emojis {
        border: 2px solid red
    }

    .comment-area {
        position: relative
    }

    .emojis li {
        cursor: pointer
    }

    .post-btn {
        height: 50px;
        font-size: 16px;
        background: #aba9a9;
        border: none
    }

    .dots {
        height: 6px;
        width: 6px;
        border-radius: 50%;
        background-color: #eee;
        margin-top: 2px;
        margin-left: 5px;
        margin-right: 5px
    }

    .name i {
        color: red;
        font-size: 13px
    }

    .time-text {
        font-size: 12px
    }

    .top-comment {
        background-color: #eee;
        padding: 2px;
        padding-left: 10px;
        padding-right: 10px;
        font-size: 12px;
        border-radius: 40px
    }

    .user-comment-text {
        font-size: 14px
    }

    .fs-13 {
        font-size: 13px
    }

</style>
