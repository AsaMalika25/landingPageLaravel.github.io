<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\landingPage;
use App\Models\ekstra;

class ekstraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = landingPage::orderBy('id', 'asc')->paginate(6);
        $data_ekstrakulikuler = ekstra::orderBy('id', 'asc')->first();
        return view('ekstrakulikuler.cms-ekstra')->with(['data' => $data, 'data_ekstrakulikuler' => $data_ekstrakulikuler]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ekstrakulikuler.create');
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
            'judul_ekstrakulikuler'=> 'required',
            'deskripsi'=> 'required',
        ],[
            
        ]);

        $data = [
            'judul' => $request->judul_ekstrakulikuler,
            'deskripsi' => $request->deskripsi,
        ];
        
        ekstra::create($data);
        // dd($data);
        return redirect()->to('list-cms')->with('success', 'berhasil menambahkan data');
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
        $data = ekstra::where('id', $id)->first();
        if($data){

            $data->delete();

            return redirect()->to('list-cms')->with('success', 'berhasil melakukan delete data');
        }else{

        }
    }
}
