<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Http\Resources\AssetResource;
use App\Immediate_Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::all();
        return AssetResource::collection($assets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $asset = $request->isMethod('put') ? Asset::findOrFail($request->id) : new Asset();

        $asset->id = $request->input('id');
        $asset->description = $request->input('description');
        $asset->sector_id = $request->input('sector_id');

        if($asset->save()){
            return new AssetResource($asset);
        }
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
        $asset = Asset::findOrFail($id);

        //return single asset as a resource
        return new AssetResource($asset);
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
        //Get Asset
        $asset = Asset::findOrFail($id);

        if($asset->delete()){
            return new AssetResource($asset);
        }
    }
}
