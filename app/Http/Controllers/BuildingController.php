<?php

namespace App\Http\Controllers;

use App\building;
use App\Http\Resources\BuildingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = DB::table('buildings')->pluck('building_name', 'id');
        return ($buildings);

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

    public function getAllBuildings(){
        $buildings = building::all();
        return BuildingResource::collection($buildings);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get Asset
        $building = building::findOrFail($id);

        //return single asset as a resource
        return new BuildingResource($building);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Get All Buildings
//    public function getAllBuildings()
//    {
//        $buildings = DB::table('buildings')->pluck('building_name', 'id');
//        return ($buildings);
//    }

    //Search Sectors by Building Id
    public function sectorsByBuildingId($buildingId){
        return  json_decode(json_encode(DB::select("SELECT sectors.id as sectorId,buildings.id as BuildingId,buildings.description  FROM sectors 
        inner join buildings 
        ON sectors. building_id = buildings.id 
        where buildings.id = '$buildingId' "
        )));
    }

}
