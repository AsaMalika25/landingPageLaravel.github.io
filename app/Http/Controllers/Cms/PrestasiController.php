<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\models\prestasi;
use App\Models\landingPage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\about;
use Illuminate\Support\Facades\File;
use Session;
use compact;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = landingPage::orderBy('id', 'asc')->paginate(6);
        $data_prestasi = prestasi::orderBy('id', 'asc')->get();
        // dd($data_prestasi);
        return view('Kompetensi.cms-kompetensi')->with(['data' => $data, 'data_prestasi' => $data_prestasi]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'prestasi.xlsx');
    }

    public function import(Request $request) 
    {
        
        // Excel::import(new UsersImport, request()->file('file'));
        Excel::import(new UsersImport, $request->file('file'));
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->judul_Prestasi);
        $request->validate([
            'judul_prestasi'=> 'required',
        ],[
            
        ]);

        $data = [
            'judul' => $request->judul_prestasi,
        ];
        
        prestasi::create($data);
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
        $data = prestasi::where('id', $id)->first();
        if($data){

            $data->delete();

            return redirect()->to('list-cms')->with('success', 'berhasil melakukan delete data');
        }else{

        }
    }
}
