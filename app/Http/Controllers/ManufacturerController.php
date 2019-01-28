<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createManufacturer()
    {
        return view('admin.manufacturer.createManufacturer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeManufacturer(Request $request)
    {
        $request->validate([
            'manufacturerName' => 'required',
           'manufacturerDescription' => 'required',
            'publicationStatus' => 'required',

            
        ]
                
                );
        
//        return $request->all();
        $manufacturer = new Manufacturer;
        $manufacturer->manufacturerName = $request->manufacturerName;
       $manufacturer->manufacturerDescription = $request->manufacturerDescription;
       $manufacturer->publicationStatus = $request->publicationStatus;
       $manufacturer->save();
       
       return redirect('/add-manufacturer')->with('status','Manufacturer Info saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageManufacturer()
    {
       $manufacturer = Manufacturer::all();
        return view('admin.manufacturer.manageManufacturer',['manu' => $manufacturer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editManufacturer($id)
    {
      $manufacturer = Manufacturer::where('id',$id)->first();
      return view('admin.manufacturer.editManufacturer',['manufac' => $manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateManufacturer(Request $request)
    {
      $manufacturer = Manufacturer::find($request->manufacturerId);
      
      $manufacturer->manufacturerName = $request->manufacturerName;
      $manufacturer->manufacturerDescription = $request->manufacturerDescription;
      $manufacturer->publicationStatus = $request->publicationStatus;
      $manufacturer->save();

      return redirect('/manage-manufacturer')->with('message','Manufacturer Info updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteManufacturer($id)
    {
      $manufacturer = Manufacturer::find($id);
      $manufacturer->delete();
      return redirect('/manage-manufacturer')->with('message','Manufacturer Info deleted successfully');
    }
}
