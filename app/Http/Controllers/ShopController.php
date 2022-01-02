<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\IceCream;
use App\Models\IceCreamShop;
use App\Models\Location;
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

    public function store(Request $request)
    {
        $apiResponse = Http::get("https://api.opencagedata.com/geocode/v1/json?key=" . env("MAP_API_KEY") . "&q={$request->lat}+{$request->lng}")->json();

        $location = new Location();
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->save();

        $shop = new IceCreamShop();
        $shop->name = $request->name;
        $shop->city = $apiResponse["results"][0]["components"]["city"];
        $shop->street_name = $apiResponse["results"][0]["components"]["road"];
        $shop->street_number = $apiResponse["results"][0]["components"]["house_number"];
        $shop->image = $request->image;
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

        return view("shops.show", [
            "shop" => $shop,
            "iceCreams" => $iceCreams,
            "location" => $location,
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
}
