<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\landingPage;
use App\Models\about;
use Illuminate\Support\Facades\File;
use Session;
use compact;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = about::orderBy('id', 'asc');
        return view("About.cms-about")->with(['data' => $data]);
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
        $request->validate([
            'judul_about'=> 'required',
            'content1'=> 'required',
            'content2'=> 'required',
        ],[ 
            
        ]);

        $data = [
            'judul' => $request->judul_about,
            'content1' => $request->content1,
            'content2' => $request->content2,
        ];

        $CekDataAbout = about::select('id')->first(); 

        if ($CekDataAbout) {

            about::where('id', $CekDataAbout->id)->update($data);
        }else{
            
            about::create($data);
        }
        // dd($data);
        return redirect()->to('list-cms')->with('success', 'berhasil menambahkan data');
    }
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
        //
    }
}
