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
        //Header is the title of the Page
        $header = "Assets";

        //SubHeader is the Subtitle of the Page
        $subheader = '@SystemAssets';

        //loggedUser
        $this->loggedUser = [
            //User Name
            'username' => \auth()->user()->name,
            'userid' => \auth()->user()->id,
            'useremail' => \auth()->user()->email,
            'unreadNotifications' => \auth()->user()->unreadNotifications
        ];

        $notifications = json_decode($this->loggedUser['unreadNotifications']);

//        Creating a Array of Data to send
        $data = ['user' => $this->loggedUser, 'header' => $header, 'subheader' => $subheader, 'notifications' => $notifications];

        //Return a Page with With values
        return view('Pages.asset')->with('data', $data);

//        $title = "Sectors";
//        $data = ['title' => $title];
//        return view('sector.index')->with('data', $data);
    }

    public function getAllAssets(){
        $assets = Asset::orderBy("id","DESC")->paginate(10);
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

    public function fullAssetDetails(){
        return  json_decode(json_encode(
            DB::select("select * from assets left outer 
            join (sectors join immediate__jobs join buildings join scheduled__jobs)
            ON buildings.id=sectors.id 
            and assets.id=sectors.id 
            and immediate__jobs.asset_id=assets.id 
            and scheduled__jobs.id = assets.id;"
        )));
    }
}
