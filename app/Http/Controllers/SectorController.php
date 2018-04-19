<?php

namespace App\Http\Controllers;

use App\Http\Resources\BuildingResource;
use App\Http\Resources\SectorResource;
use App\sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Header is the title of the Page
        $header = "Sectors";

        //SubHeader is the Subtitle of the Page
        $subheader = '@BuildingSector';

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
        return view('Pages.sector')->with('data', $data);

//        $title = "Sectors";
//        $data = ['title' => $title];
//        return view('sector.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Sectors";
        $data = ['title' => $title];
        return view('sector.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get Sector
        $sector = sector::findOrFail($id);

        //return single Sector as a resource
        return new SectorResource($sector);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Buildings Corresponding Sectors->$sector_id
    public  function getBuildings($sector_id){
        $buildings = DB::table('buildings')->join('sectors','sectors.building_id', '=' , 'buildings.id')
            ->where('sectors.id',$sector_id)->select('buildings.*')->get();

        return new BuildingResource($buildings[0]);

    }




}
