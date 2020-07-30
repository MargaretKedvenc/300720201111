<?php

namespace App\Http\Controllers;

use App\Address;
use App\Area;
use App\City;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AddressController extends BaseController
{
    public function index()
    {
        return view('addresses', [
            'cities' => City::all(),
            'areas' => Area::all(),
            'addresses' => Address::all(),
        ]);
    }

    public function store(AddressRequest $request)
    {
        $address = Address::create([
            'name' => $request->input('name'),
            'city_id' => $request->input('cityId'),
            'area_id' => $request->input('areaId'),
            'street' => $request->input('street'),
            'house' => $request->input('house'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back();
    }

}
