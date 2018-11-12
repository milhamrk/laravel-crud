<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;

class fileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = file::all();
		return view('file', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fileTambah');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$uploadedFile = $request->file('email');
		$nama = date('Ydhmis').".".$uploadedFile->getClientOriginalExtension();
		$uploadedFile->move('data',$nama);
		$file = new file();
		$file->nama = $request->nama;
		$file->file = $nama;
		$file->save();
		return redirect('file')->with('alert-success','File berhasil ditambah');
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
        $data = file::where('id',$id)->first();
		return view('fileTambah', compact('data'));
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
		$data = file::findOrFail($id);
		$data->nama = $request->nama;
		if(empty($request->file('email'))){
			$data->file = $data->file;
		}
		else{
			unlink('data/'.$data->file);
			$uploadedFile = $request->file('email');
			$nama = date('Ydhmis').".".$uploadedFile->getClientOriginalExtension();
			$uploadedFile->move('data',$nama);
			$file->file = $nama;
		}
		$data->save();
		return redirect('file')->with('alert-success','Data file berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = file::where('id',$id)->first();
		$file->delete();
		return redirect('file')->with('alert-success','File berhasil dihapus');
    }
}
