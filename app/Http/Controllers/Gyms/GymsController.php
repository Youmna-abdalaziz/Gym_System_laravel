<?php

namespace App\Http\Controllers\Gyms;

use App\Gym;
use App\User;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GymsController extends Controller
{
    public function index()
    {
        return view('gyms.index',[
            'gyms' => Gym::all()
            //return datatables()->of(Gym::query())->toJson();
        ]);
    }
   
    public function create()
    {
        $cities = City::all();
        return view('gyms.create',[
            'cities' => $cities
        ]);
    }

    public function store(Request $request)
    {
        Gym::create(request()->all());
        return redirect()->route('gyms.index');
    }

    public function edit(Gym $gym)
    {
        return view('gyms.edit', [
            'gym' => $gym,
        ]);
    } 

    public function update(Request $request, Gym $gym)
    {
        $gym->update(request()->all());
        return redirect()->route('gyms.index');
    }

    public function destroy(Gym $gym)
    {
        $gym->delete();
        return redirect()->route('gyms.index');
    }

    public function show(Gym $gym)
    {
        return view('gyms.show', [
            'gym' => $gym,
        ]);
    }  
    
    public function get_table(){
        return datatables()->of(Gym::query())->toJson();
    }
}
