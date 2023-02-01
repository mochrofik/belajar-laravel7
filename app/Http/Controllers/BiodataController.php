<?php

namespace App\Http\Controllers;

use App\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $biodata = Biodata::latest()->paginate(5);
        return view('biodata.index',compact('biodata'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        Biodata::create($request->all());
        return redirect()->route('biodata.index')->with('success','Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $biodata = Biodata::find($id);

        return view('biodata.show',compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $biodata = Biodata::find($id);
        return view('biodata.edit',compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validData=  $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Biodata::where('id', $id )->update($validData);
        return redirect()->route('biodata.index')->with('success','biodata berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        Biodata::where('id', $id )->delete();
       
        return redirect()->route('biodata.index')->with('success','Biodata berhasil dihapus');
    
    }
}
