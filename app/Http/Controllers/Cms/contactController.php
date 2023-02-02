<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\contact;

class contactController extends Controller
{
    public function index()
  {
    $data_contact = contact::orderBy('id', 'asc')->first();
    return view('cms.cms-banner')->with(['data_contact' => $data_contact]);
  }
  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'subject' => 'required',
      'name' => 'required',
      'message' => 'required',
    ]);

    $data = [
      'subject' => $request->subject,
      'nama' => $request->name,
      'email' => $request->email,
      'message' => $request->message
    ];
    contact::create($data);

    return back()->with('message', 'Email successfully sent');
  }

  function sendfeedback(Request $request, $emailuser)
  {

    $request->validate([
      'email' => 'required|email',
      'subject' => 'required',
      'name' => 'required',
      'message' => 'required',
    ]);

    $data = $request->all();

    // dd($data['message']);

    if ($data) {
      Mail::send('emails.feedback', $data, function($message) use($data, $emailuser) {
       $message->to($emailuser)->subject($data['subject']);
       $message->from(env('MAIL_USERNAME'), $data['name']);
    });

      return redirect()->to('list-cms');
    
    }
  }

  public function message(Request $request, $email)
  {

    return view('Contact.balas-pesan', compact('email'));
  }

  public function destroy($id)
  {
    $data = contact::where('id', $id)->first();
    if ($data) {

      $data->delete();

      return redirect()->to('list-cms')->with('success', 'berhasil melakukan delete data');
    } else {
    }
  }
}
