<?php

namespace App\Http\Controllers;

use App\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('family.index');   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $families_data = $request->all();
        //  dump($families_data);
         $arra_length = sizeof($families_data['name']);
        //  dump($families_data);
        //  dd($arra_length);
         $array_push = [];
         for ($i=0; $i < $arra_length; $i++) { 
            $array_push[$i] = array('name' => $families_data['name'][$i] , 'surname' => $families_data['surname'][$i]);
        }
        // dump($array_push);
        DB::table('families')->insert($array_push);
        return view('family.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        //
    }
}
