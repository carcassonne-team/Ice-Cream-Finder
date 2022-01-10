<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Comment;
use App\Models\IceCream;
use App\Models\IceCreamShop;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $shops = IceCreamShop::query()->get();

        return view("shops.index", [
            "shops" => $shops,
        ]);
    }

    public function indexMyShops(): View
    {
        $userId = Auth::user()->id;
        $shops = IceCreamShop::query()->where("user_id", $userId)->get();

        return view("shops.index", [
            "shops" => $shops,
        ]);
    }

    public function create(): View
    {
        return view("shops.create");
    }

    public function store(ShopRequest $request)
    {
        $apiResponse = Http::get("https://api.opencagedata.com/geocode/v1/json?key=" . env("MAP_API_KEY") . "&q={$request->lat}+{$request->lng}")->json();
        $location = new Location();
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->save();

        $shop = new IceCreamShop();
        $shop->name = $request->name;
        $shop->open_from = $request->open_from;
        $shop->open_to = $request->open_to;
        $shop->city = $apiResponse["results"][0]["components"]["city"];
        $shop->street_name = $apiResponse["results"][0]["components"]["road"];
        $shop->street_number = $apiResponse["results"][0]["components"]["house_number"];
        if ($request->hasfile('photo')) {
            $path = $request['photo']->store('shops','public');
            $shop->image = $path;
        }
        $shop->user_id = Auth::user()->id;
        $shop->location_id = $location->id;
        $shop->save();

        return redirect("/shops")->with("message", "Pomyślnie dodano sklep.");
    }

    public function show($id): View
    {
        $shop = IceCreamShop::query()->findOrFail($id);
        $iceCreams = IceCream::query()->where("ice_cream_shop_id", "=", $shop->id)->where("available", true)->get();
        $location = Location::query()->findOrFail($shop->location_id);
        $comments = Comment::query()->where("ice_cream_shop_id", "=", $shop->id)->get();
        $carbon = new Carbon() ;

        return view("shops.show", [
            "shop" => $shop,
            "iceCreams" => $iceCreams,
            "location" => $location,
            "comments" => $comments,
            "carbon" => $carbon,
        ]);
    }

    public function edit($id): void
    {
        //
    }

    public function update(Request $request, $id): void
    {
        //
    }

    public function destroy($id)
    {
        IceCreamShop::query()->findOrFail($id)->delete();

        return redirect("/shops")->with("message", "Pomyślnie usunięto sklep.");
    }

    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->ice_cream_shop_id = $request->ice_cream_shop_id;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        return redirect("/shops/{$request->ice_cream_shop_id}")->with("message", "Pomyślnie dodano komentarz.");
    }
}
