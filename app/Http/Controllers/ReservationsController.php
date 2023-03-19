<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Models\Cities;
use App\Models\Reservations;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Reservations::all();
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard')->with([
                'cities' => Cities::getSelectedCities()
            ]);
        }
        return redirect("login")->with('You are not allowed to access');
    }

    public function getCrossoverCities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source_city' => 'required|int',
            'destination_city' => 'required|int|different:source_city',
        ]);
        if ($validator->fails()) {
            $message = view('partials/messages/flash-message')->with([
                'validation_msg' => $validator->messages()->first(),
                'alert_type'=>'alert-warning'
            ])->render();
            return ['message' => $message];
        }
        $cities = Cities::get(['id', 'city_name', 'sort'])->whereIn('sort' , range(3, 5))->toArray();
        dd($cities);
//        $cities_collection = collect($cities);
//        return $cities_collection->mapWithKeys(function (array $city) {
//            return [$city['id'] => $city['city_name']];
//        });
        return view('dashboard')->with([
            'cross_over_cities' => Cities::getCrossOverCities($request->input('source_city'), $request->input('destination_city'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationsRequest $request)
    {
        return Reservations::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations $reservations)
    {
        // return Article::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationsRequest $request, Reservations $reservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations $reservations)
    {
        //
    }
}
