<?php

namespace App\Http\Controllers;

use App\Truck;
use App\Mechanic;
use Validator;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks = Truck::all();
        return view('truck.index', ['trucks' => $trucks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mechanics = Mechanic::all();
        return view('truck.create', ['mechanics' => $mechanics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'truck_maker' => ['required', 'min:2', 'max:24'],
            'truck_plate' => ['required', 'min:6', 'max:9'],
            'truck_make_year' => ['required', 'min:4', 'max:10'],
        ],
        [
            'truck_maker.reqired' => 'Įveskite Gamintoją!',
            'truck_maker.min' => 'Patikrinkite Gamintoją!',
            'truck_plate.required' => 'Įveskite Valst.nr!',
            'truck_plate.min' => 'Paikrinkite Valst.Nr.!',
            'truck_make_year.required' => 'Įveskite gamybos metus!',
            'truck_make_year.min' => 'Patikrinkite gamybos metus!',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $truck = new Truck;
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Įrašas sukurtas!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('truck.edit', ['truck' => $truck, 'mechanics' => $mechanics]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $validator = Validator::make($request->all(),
        [
            'truck_maker' => ['required', 'min:2', 'max:24'],
            'truck_plate' => ['required', 'min:6', 'max:9'],
        ],
        [
            'truck_maker.reqired' => 'Įveskite Gamintoją!',
            'truck_maker.min' => 'Per trumpas įrašas!',
            'truck_plate.required' => 'Įveskite Valst.nr!',
            'truck_plate.min' => 'Per trumpas įrašas!',
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Duomenys atnaujinti!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
       
        $truck->delete();
        return redirect()->route('truck.index')->with('success_message', 'Duomenys ištrinti!');    }
}
