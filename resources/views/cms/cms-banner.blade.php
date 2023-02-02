@extends('layout/backend_layout')      
      <!-- START DATA -->
@section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('list-cms') }}" method="post">
                    @csrf
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    @if (Auth::User()->role == 1)
                  <a href='{{ url('/create-cms')}}' class="btn btn-primary">+ Tambah Data</a>
                  @endif
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">gambar banner</th>
                            <th>Judul halaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><image alt="img"width="150px"src="{{ url('public/image/'.$item->nama_banner) }}"></td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                @if (Auth::User()->role == 1)
                                    
                                <a href='{{url('edit-cms/'.$item->id)}}' class="btn btn-warning btn-sm">Edit</a>
                                {{-- <a href='{{url('edit/'.$item->nim)}}' class="btn btn-warning btn-sm">Edit</a> --}}
                                <form  onsubmit="return confirm('igin menghapus data ini?')" class='d-inline' action="{{ url('delete-Cms/'.$item->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                            <a href='{{url('detail-cms/'.$item->id)}}' class="btn btn-warning btn-sm">Detail</a>  
                            @endif
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{ $data->links() }}
          </div>
         @include('About.cms-about')
         @include('Kompetensi.cms-kompetensi')
         @include('Logo.cms-logo')
         @include('Prestasi.cms-prestasi')
         @include('ekstrakulikuler.cms-ekstra')
         @include('Contact.cms-contact')
          <!-- AKHIR DATA -->
          @endsection