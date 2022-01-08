@extends('layout.layout')

@section('content')
    <div class="container mx-auto">
        <div class="row main ">
            <div class="col-lg-12 ">
                <br>
                        <h3 class="payment d-flex justify-content-center">Profil użytkownika {{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
                        <br>
                        <br>
                        <h4 class="payment d-flex justify-content-center">Polubione lody:</h4>
                        <div class="">
                            <ul class="list-group d-flex justify-content-center">
                                @foreach($likedIceCream as $iceCream)
                                    <li class="list-group-item d-flex justify-content-between heart">{{\App\Models\Flavor::query()->where('id', $iceCream->flavor_id)->value('name')}} - {{\App\Models\IceCreamShop::query()->where('id', $iceCream->ice_cream_shop_id)->value('name')}}
                                        <a class="like btn btn-primary far" href="/shops/{{$iceCream->ice_cream_shop_id}}">Zobacz</a>
                                    </li>
                                @endforeach
                            </ul>
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
