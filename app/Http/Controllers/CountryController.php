<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if($request->embed === "hotels")
        return Country::with('hotels')->get();
        return Country::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:countries,title|max:255',
            'season' => 'required|max:255'
        ]);
        return Country::create($request->all());
    }

    public function show($id, Request $request)
    {
        if($request->embed === "hotels")
        return Country::with('hotels')->find($id);
        return Country::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:countries,title,'.$id.',id|max:255',
            'season' => 'required|max:255'
        ]);
        $country = Country::find($id);
        $country->update($request->all());
        return $country;
    }

    public function destroy($id)
    {
        return Country::destroy($id) === 0 ? response(["status" => "failure"], 404) : response(["message" => "success"], 200);
    }


    public function storeCountryHotel($id, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'photo' => 'required',
            'length' => 'required'
    ]);
        return Country::find($id)->hotels()->save(Hotel::create($request->all()));
    }
}
