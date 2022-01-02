<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FlavorRequest;
use App\Models\Flavor;
use App\Models\IceCream;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlavorController extends Controller
{
    public function index(): Collection
    {
        return Flavor::query()->get();
    }

    public function create(): View
    {
        return view("flavor.create");
    }

    public function store(FlavorRequest $request)
    {
        $flavor = new Flavor();
        $flavor->name = $request->name;
        $flavor->save();

        $iceCream = new IceCream();
        $iceCream->available = true;
        $iceCream->ice_cream_shop_id = $request->shopId;
        $iceCream->flavor_id = $flavor->id;
        $iceCream->save();

        return response()->json([
            "success" => "Pomyślnie dodano smak",
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
        Flavor::query()->findOrFail($id)->delete();

        return redirect("/shops")->with("message", "Pomyślnie usunięto smak.");
    }
}
