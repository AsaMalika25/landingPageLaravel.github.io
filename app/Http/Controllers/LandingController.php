<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\landingPage;
use App\Models\about;
use App\Models\ekstra;
use App\Models\kompetensi;
use App\Models\prestasi;
use App\Models\logo;
use App\Models\contact;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = landingPage::orderBy('id', 'asc')->first();
        $data_about = about::orderBy('id', 'asc')->first();
        $data_prestasi = prestasi::orderBy('id', 'asc')->get();
        $data_kompetensi = kompetensi::orderBy('id', 'asc')->get();
        $data_ekstrakulikuler = ekstra::orderBy('id', 'asc')->get();
        $data_logo = logo::orderBy('id', 'asc')->get();
        $data_contact = contact::orderBy('id', 'asc')->get();

        
        if (
            $data && 
            $data_about && 
            $data_kompetensi && 
            $data_logo && 
            $data_prestasi 
            && $data_ekstrakulikuler
            && $data_contact
            ) {
            
            return view('tampilan.index',compact(
                'data', 
                'data_about', 
                'data_kompetensi', 
                'data_logo', 
                'data_prestasi', 
                'data_ekstrakulikuler',
                'data_contact'
            ));
        }else{
            return abort(404, 'Halaman tidak bisa diakses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Login.login');     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($data);
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
        //
    }
}
