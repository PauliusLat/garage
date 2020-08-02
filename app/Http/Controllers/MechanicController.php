<?php

namespace App\Http\Controllers;

use App\Mechanic;
use App\Truck;
use Validator;
use Illuminate\Http\Request;

class MechanicController extends Controller
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
        $mechanics = Mechanic::all();
        return view('mechanic.index', ['mechanics' => $mechanics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
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
            'mechanic_name' => ['required', 'min:3', 'max:64'],
            'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'mechanic_name.min' => 'Per trumpas Vardas!',
            'mechanic_name.max' => 'Per ilgas Vardas!',
            'mechanic_name.required' => 'Įveskite Vardą!',
            'mechanic_surname.min' => 'Per trumpa Pavardė!',
            'mechanic_surname.max' => 'Per ilga Pavardė!',
            'mechanic_surname.required' => 'Įveskite Pavardę!'
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
     
        $mechanic = new Mechanic;
        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->portret = '';

        if ($request->hasFile('portret')) {
            $image = $request->file('portret');
            $name = $request->file('portret')->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $mechanic->portret = $name;
        }else{
            $mechanic->portret = 'def.jpg';
        }

        $mechanic->save();
        return redirect()->route('mechanic.index')->with('success_message', 'Įrašas sukurtas!');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        return view('mechanic.show', ['mechanic' => $mechanic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanic.edit', ['mechanic' => $mechanic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        $validator = Validator::make($request->all(),
        [
            'mechanic_name' => ['required', 'min:3', 'max:64'],
            'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ],
        [
            'mechanic_name.min' => 'Per trumpas Vardas!',
            'mechanic_name.max' => 'Per ilgas Vardas!',
            'mechanic_name.required' => 'Įveskite Vardą!',
            'mechanic_surname.min' => 'Per trumpa Pavardė!',
            'mechanic_surname.max' => 'Per ilga Pavardė!',
            'mechanic_surname.required' => 'Įveskite Pavardę!'
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->save();
        return redirect()->route('mechanic.index')->with('success_message', 'Duomenys atnaujinti!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if($mechanic->mechanicTrucks->count()){
            return redirect()->route('mechanic.index')->with('info_message', 'Trinti negalima, nes turi sunkvežimių!');
        }
        $mechanic->delete();
        return redirect()->route('mechanic.index')->with('success_message', 'Įrašas ištrintas!');    }
}
