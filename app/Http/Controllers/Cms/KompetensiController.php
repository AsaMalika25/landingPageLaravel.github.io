<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\landingPage;
use App\Models\kompetensi;
use Illuminate\Support\Facades\File;
use Session;
use compact;

class KompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = landingPage::orderBy('id', 'asc')->paginate(6);
        $data_kompetensi = kompetensi::orderBy('id', 'asc')->first();
        return view('Kompetensi.cms-kompetensi')->with(['data' => $data, 'data_kompetensi' => $data_kompetensi]);
    }
    public function search(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)) {
            $data = kompetensi::where('judul', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = kompetensi::orderby('id', 'asc')->paginate($jumlahbaris);
        }
        return view('Kompetensi.cms-kompetensi')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kompetensi.create');
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
            'judul_kompetensi'=> 'required',
            'deskripsi'=> 'required',
        ],[
            
        ]);

        $data = [
            'judul' => $request->judul_kompetensi,
            'deskripsi' => $request->deskripsi,
        ];
        
        kompetensi::create($data);
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
        $data = kompetensi::where('id',$id)->first();
        if($data){
            return view('Kompetensi.edit')->with('data', $data);
        }else{
            return redirect()->back();
        }
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
            'judul_kompetensi'=> 'required',
            'deskripsi'=> 'required',
        ],[
            
        ]);

        $data = [
            'judul' => $request->judul_kompetensi,
            'deskripsi' => $request->deskripsi,
        ];
        
        kompetensi::where('id', $id)->update($data);
        // dd($data);
        return redirect()->to('list-cms')->with('success', 'berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kompetensi::where('id', $id)->first();
        if($data){

            $data->delete();

            return redirect()->to('list-cms')->with('success', 'berhasil melakukan delete data');
        }else{

        }
    }
}
