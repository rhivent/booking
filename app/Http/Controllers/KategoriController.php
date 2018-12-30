<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\KategoriImport;
use App\Kategori;
use Excel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kategori = Kategori::all();
        return view('kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'nama_kategori' => 'required|min:3',
        ]);        

        $kategori = Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success','Data successful added!');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit',compact('kategori'));
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
        $request->validate([
            'nama_kategori' => 'required|min:3',
        ]);        

        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success','Data successful updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success','Data successful deleted!');
    }

    public function excel(){
        return view('kategori.excel');
    }

    public function upload(Request $request){
        $request->validate([
            'file_upload_xls' => 'required|mimes:xls,xlsx|max:1000',
        ]);
        // upload data yg ada di excel harus ada minimal 11 data jika kurang maka ada error
        if($request->hasFile('file_upload_xls')){
            $file = $request->file('file_upload_xls');
            Excel::import(new KategoriImport,$file);
            return redirect()->route('kategori.index')->with('success','Import successful !');
        }

        return redirect()->back()->with('success','Import Failed !');
            
    }
}
