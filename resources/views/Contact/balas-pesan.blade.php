@extends('layout/backend_layout')
@section('konten')
    
<form class="row g-3" action="" method="POST">
  @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Nama</label>
      <input type="text" class="form-control" name="name"id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="{{$email}}"id="inputCity" readonly>
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">Subject</label>
      <input type="text" class="form-control" name="subject" id="inputCity">
    </div>
    <div class="col-md-6">
      <label for="name">Message</label>
      <textarea class="form-control" name="message" rows="10" required></textarea>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">kirim</button>
    </div>
  </form>
@endsection