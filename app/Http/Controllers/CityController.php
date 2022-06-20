<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// use App\Models\Game;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = DB::table('city')->get();
        
        return view('index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'countrycode' => 'required|max:255',
            'district' => 'required|max:255',
            'population' => 'required|max:255',
        ]);

        // $show = DB::table('city')->create($validatedData);
        $show = DB::statement("INSERT INTO `city`(`Name`, `CountryCode`, `District`, `Population`) VALUES ('$validatedData[name]','$validatedData[countrycode]','$validatedData[district]','$validatedData[population]')");
        // $show = Game::create($validatedData);
   
        return redirect('/cities')->with('success', 'Game is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = DB::table('city')->whereId($id)->first();

        return view('edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'countrycode' => 'required|max:255',
            'district' => 'required|max:255',
            'population' => 'required|max:255',
        ]);
        DB::table('city')->whereId($id)->update($validatedData);

        return redirect('/cities')->with('success', 'Game Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $show = DB::statement("DELETE FROM `city` WHERE `ID` = $id");

        return redirect('/cities')->with('success', 'Game Data is successfully deleted');
    }
}
