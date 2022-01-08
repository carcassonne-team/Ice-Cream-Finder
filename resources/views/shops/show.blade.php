@extends('layout.layout')

@section('content')

    @if(session()->has('message'))
        <br>
        <div class="alert alert-success ">
            {{ session()->get('message') }}
        </div>
    @endif

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
                                        <button class="like btn btn-primary far fa-heart" data-id="{{$iceCream->id}}">
                                            {{$iceCream->likeCount}}</button>
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
                        <x-map lat="{{$location->lat}}" lng="{{$location->lng}}" shopName="{{$shop->name}}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-sm-5">
        <div class="col-12">
            <div class="shadow p-3 bg-white rounded">

                    <div class="d-flex flex-row">
                        <div class="w-100 ml-2 comment-area">
                            <h1 class="d-flex justify-content-center">Komentarze:</h1>
                            @auth
                            <br>
                            <p>Napisz swój komentarz:</p>
                            <form method="post" action="{{route("store.comment")}}">
                                @csrf
                                <div class="form-group" >
                                    <input type="text" class="form-control" id="body" name="body">
                                    <input type="hidden" class="form-control" id="ice_cream_shop_id" name="ice_cream_shop_id" value="{{$shop->id}}">
                                    <br>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Dodaj</button>
                            </form>
                            @endauth
                        </div>
                    </div>

                <div class="d-flex flex-row mt-4">
                    <div class="ml-2 w-100">
                        @foreach($comments as $comment)
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center">
                                <span class="font-weight-bold name">{{\App\Models\User::query()->where('id', $comment->user_id)->value('name')}}</span>
                            </div>
                        </div>
                        <p class="user-comment-text text-justify">{{$comment->body}}
                        </p>
                        @endforeach
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

@section('script')
    <script>
        $(function () {
            $(document).on('click', 'button.like', function () {
                let i = $(this).text();
                if ($(this).hasClass("far")) {
                    i++;
                    $(this).toggleClass("far fas")
                    $(this).html(" "+i)
                    doAJAX("{{route('like.flavor')}}", 2)
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
                    flavorId: id,
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR)
                }
            });
        }

    </script>
@endsection
