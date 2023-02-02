<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\landingPage;
use App\Models\logo;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = landingPage::orderBy('id', 'asc')->paginate(6);
        $data_logo = logo::orderBy('id', 'asc')->first();
        return view('Logo.cms-logo')->with(['data' => $data, 'data_logo' => $data_logo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Logo.create');
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
            'logo' => 'required|image|mimes:jpg,png,jpeg,jpeg,gif,webp',
            'judul'=> 'required',
        ],[
            
        ]);
        if (!$request->file('logo')) {
            return redirect()->back()->with('gambar tidak berhasil di upload');
        }

        $image_file = $request->file('logo');
        $image_ekstensi = $image_file->extension();
        $image_nama = 'logo-lp-'.date('ymdhis', strtotime('+7 hour')) . '.' . $image_ekstensi;
        $image_file->move(public_path('image'), $image_nama);

        $data = [
            'logo_banner'=>$image_nama,
            'judul' => $request->judul_halaman,
        ];

        // dd($data);
        logo::create($data);
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
        $data = logo::where('id',$id)->first();
        return view('Logo.detail_data')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = logo::where('id',$id)->first();
        if($data){
            return view('Logo.edit')->with('data', $data);
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
            'logo' => 'required|image|mimes:jpg,png,jpeg,jpeg,gif',
            'judul_halaman'=> 'required'
        ],[

        ]);
        if (!$request->file('logo_banner')) {
            return redirect()->back()->with('gambar tidak berhasil di upload');
        }
        
        $data = [
            'logo_banner'=>$request->logo_banner,
            'judul' => $request->judul_halaman,

        ];

        if($request->hasfile('logo_banner')) {

            // $data = landingPage::where('id',$id)->first();

            // if ($data) {
                
            //     if (file_exists(public_path('image'), $data->nama_banner)) {
            //         unlink(public_path('image'), $data->nama_banner);
            //     }
            // }

            $request->validate([
               'logo_banner' => 'mimes:jpeg,jpg,png,gif'
            ],[
                'image.mimes' =>'foto hanya diperbolehkan berekstensi JPEG, jpg,PNG, dan GIF'
            ]);
            $image_file = $request->file('logo_banner');
            // dd($image_file);
            $image_ekstensi = $image_file->extension();
            $image_nama = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('image'), $image_nama);

            // sudah terupload ke direktori

            $data_image = logo::where('id', $id) ->first();
            File::delete(public_path('image'). '/'. $data_image->nama_banner);

            // $data = [
            //     'image' => $image_nama
            // ];
            $data['logo_banner'] = $image_nama;
        }
        logo::where('id', $id)->update($data);
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
        $data = logo::where('id', $id)->first();
        if($data){
            File::delete(public_path('image'). '/'. $data->nama_banner);

            $data->delete();

            return redirect()->to('list-cms')->with('success', 'berhasil melakukan delete data');
        }else{

        }
    }
}
