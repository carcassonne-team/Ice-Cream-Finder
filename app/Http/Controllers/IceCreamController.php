<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IceCreamRequest;
use App\Models\IceCream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function like(Request $request): void
    {
        $iceCream = IceCream::query()->findOrFail($request->id);
        $iceCream->like();
    }

    public function unlike(Request $request): void
    {
        $iceCream = IceCream::query()->findOrFail($request->id);
        $iceCream->unlike();
    }

    public function show(): View
    {
        $myUserId = Auth::user()->id;

        $likedIceCream = IceCream::whereLikedBy($myUserId) // find only articles where user liked them
            ->with("likeCounter") // highly suggested to allow eager load
            ->get();

        return view("dashboard", [
            "likedIceCream" => $likedIceCream,
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
        IceCream::query()->findOrFail($id)->delete();

        return redirect("/shops")->with("message", "Pomyślnie usunięto produkt.");
    }
}
