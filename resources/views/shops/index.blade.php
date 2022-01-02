@extends('layout.layout')

@section('content')
    <div class="container mydiv">
        <div class="row">
            @foreach($shops as $shop)
            <div class="col-md-4">
                <div class="bbb_deals mt-3" >
                    <div class="bbb_deals_title"><a href="{{route('shops.id',$shop->id)}}">{{$shop->name}}</a></div>
                    <div class="bbb_deals_slider_container">
                        <div class="bbb_deals_item">
                            <div class="bbb_deals_image"><img
                                    src="https://static.turbosquid.com/Preview/2017/02/15__11_06_03/2.pngEE1C23C6-2483-409B-AD17-4A772BE5BC9AOriginal.jpg"
                                    alt="shop"></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name">
                                        <br>
                                        <h5>{{$shop->city}}, ul. {{$shop->street_name}} {{$shop->street_number}}</h5>
                                    </div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex justify-content-between">
                                        <div class="available_title">Dostępnych smaków: <span>{{\App\Models\IceCream::query()->where('available', true)->where('ice_cream_shop_id', $shop->id)->count()}}</span></div>
                                        @auth()
                                            <button class="like btn btn-primary far fa-heart"></button>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/heart.js')}}"></script>
@endsection

<style>
    .mydiv {
        margin-top: 50px;
        margin-bottom: 50px
    }

    .bbb_deals_image {
        height: 300px
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 8px 0;
        background-color: #3498db;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 100 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center
    }

    div {
        display: block;
        position: relative;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }


    .bbb_deals {
        width: 100%;
        background-color: rgba(238, 217, 217, 0.8);
        margin-right: 7%;
        padding-top: 80px;
        padding-left: 25px;
        padding-right: 25px;
        padding-bottom: 34px;
        box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-top: 0px
    }

    .bbb_deals_title {
        position: absolute;
        top: 27px;
        left: 40px;
        font-size: 18px;
        font-weight: 500;
        color: #000000
    }

    .bbb_deals_slider_container {
        width: 100%
    }

    .bbb_deals_item {
        width: 100% !important
    }

    .bbb_deals_image {
        width: 100%
    }

    .bbb_deals_image img {
        width: 100%
    }

    .bbb_deals_content {
        margin-top: 33px
    }

    .bbb_deals_item_category a {
        font-size: 14px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.5)
    }

    .bbb_deals_item_price_a {
        font-size: 14px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.6)
    }

    .bbb_deals_item_name {
        font-size: 24px;
        font-weight: 400;
        color: #000000
    }

    .bbb_deals_item_price {
        font-size: 24px;
        font-weight: 500;
        color: #df3b3b
    }

    .available {
        margin-top: 19px
    }

    .available_title {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.5);
        font-weight: 400
    }

    .available_title span {
        font-weight: 700
    }

    @media only screen and (max-width: 991px) {
        .bbb_deals {
            width: 100%;
            margin-right: 0px
        }
    }

    @media only screen and (max-width: 575px) {
        .bbb_deals {
            padding-left: 15px;
            padding-right: 15px
        }

        .bbb_deals_title {
            left: 15px;
            font-size: 16px
        }

        .bbb_deals_slider_nav_container {
            right: 5px
        }

        .bbb_deals_item_name,
        .bbb_deals_item_price {
            font-size: 20px
        }
    }
</style>
