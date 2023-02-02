<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\landingPage;
use App\Models\about;
use App\Models\kompetensi;
use App\Models\prestasi;
use App\Models\logo;
use App\Models\ekstra;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use compact;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = landingPage::orderBy('id', 'asc')->paginate(6);
        $data_about = about::orderBy('id', 'asc')->first();
        $data_kompetensi = kompetensi::orderBy('id', 'asc')->get();
        $data_logo = logo::orderBy('id', 'asc')->paginate(6);
        $data_prestasi = prestasi::orderBy('id', 'asc')->get();
        $data_ekstrakulikuler = ekstra::orderBy('id', 'asc')->get();
        $data_contact = contact::orderBy('id', 'asc')->get();
        return view('cms.cms-banner')->with([
        'data' => $data, 
        'data_about' => $data_about, 
        'data_kompetensi' => $data_kompetensi, 
        'data_logo' => $data_logo, 
        'data_prestasi' => $data_prestasi,
        'data_ekstrakulikuler' => $data_ekstrakulikuler,
        'data_contact' => $data_contact]);
    }
    public function search(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)) {
            $data = about::where('judul', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = about::orderby('id', 'asc')->paginate($jumlahbaris);
        }
        return view('Cms.cms-about')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    Session::flash('nama_banner',$request->nama_banner); 
    
        // dd($request->judul_halaman);
       
        $request->validate([
            'nama_banner' => 'required|image|mimes:jpg,png,jpeg,jpeg,gif,webp',
            'judul_halaman'=> 'required',
        ],[
            
        ]);
        if (!$request->file('nama_banner')) {
            return redirect()->back()->with('gambar tidak berhasil di upload');
        }

        $image_file = $request->file('nama_banner');
        $image_ekstensi = $image_file->extension();
        $image_nama = 'banner-lp-'.date('ymdhis', strtotime('+7 hour')) . '.' . $image_ekstensi;
        $image_file->move(public_path('image'), $image_nama);

        $data = [
            'nama_banner'=>$image_nama,
            'judul' => $request->judul_halaman,
        ];

        // dd($data);
        landingPage::create($data);
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
        $data = landingPage::where('id',$id)->first();
        return view('cms.detail_data')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = landingPage::where('id',$id)->first();
        if($data){
            return view('cms.edit')->with('data', $data);
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
            'nama_banner' => 'required|image|mimes:jpg,png,jpeg,jpeg,gif',
            'judul_halaman'=> 'required'
        ],[

        ]);
        if (!$request->file('nama_banner')) {
            return redirect()->back()->with('gambar tidak berhasil di upload');
        }
        
        $data = [
            'nama_banner'=>$request->nama_banner,
            'judul' => $request->judul_halaman,

        ];

        if($request->hasfile('nama_banner')) {

            // $data = landingPage::where('id',$id)->first();

            // if ($data) {
                
            //     if (file_exists(public_path('image'), $data->nama_banner)) {
            //         unlink(public_path('image'), $data->nama_banner);
            //     }
            // }

            $request->validate([
               'image' => 'mimes:jpeg,jpg,png,gif'
            ],[
                'image.mimes' =>'foto hanya diperbolehkan berekstensi JPEG, jpg,PNG, dan GIF'
            ]);
            $image_file = $request->file('nama_banner');
            // dd($image_file);
            $image_ekstensi = $image_file->extension();
            $image_nama = date('ymdhis') . "." . $image_ekstensi;
            $image_file->move(public_path('image'), $image_nama);

            // sudah terupload ke direktori

            $data_image = landingPage::where('id', $id) ->first();
            File::delete(public_path('image'). '/'. $data_image->nama_banner);

            // $data = [
            //     'image' => $image_nama
            // ];
            $data['nama_banner'] = $image_nama;
        }
        landingPage::where('id', $id)->update($data);
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
        $data = landingPage::where('id', $id)->first();
        if($data){
            File::delete(public_path('image'). '/'. $data->nama_banner);

            $data->delete();

            return redirect()->to('list-cms')->with('success', 'berhasil melakukan delete data');
        }else{

        }
    } 
}   
