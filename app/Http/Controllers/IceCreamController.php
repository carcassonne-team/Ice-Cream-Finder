<?php

namespace App\Http\Controllers;

use App\Http\Requests\IceCreamRequest;
use App\Models\Flavor;
use App\Models\IceCream;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IceCreamController extends Controller
{
    public function index(): View
    {
        //
    }

    public function create(): View
    {
        return view("icecream.create");
    }

    public function store(IceCreamRequest $request)
    {
        $iceCream = new IceCream();
        $iceCream->available = true;
        $iceCream->available = $request->ice_cream_shop_id;
        $iceCream->available = $request->flavor_id;
        $iceCream->save();

        return redirect("/shops")->with("message", "Pomyślnie dodano produkt.");
    }

    public function show($id): View
    {
        //
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
        IceCream::query()->findOrFail($id)->delete();

        return redirect("/shops")->with("message", "Pomyślnie usunięto produkt.");
    }

    public function getFlavor($id)
    {
        $flavorId = IceCream::query()->findOrFail($id)->value("flavor_id");

        return Flavor::query()->findOrFail($flavorId)->value("name");
    }
}
