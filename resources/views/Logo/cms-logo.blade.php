<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h1>Logo</h1>
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
          <a href='{{ url('/create-logo')}}' class="btn btn-primary">+ Tambah Data</a>
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
                @foreach ($data_logo as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><image alt="img"width="150px"src="{{ asset('public/image/'.$item->logo_banner) }}"></td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        @if (Auth::User()->role == 1)
                        <a href='{{url('edit-Cms/'.$item->id)}}' class="btn btn-warning btn-sm">Edit</a>
                        {{-- <a href='{{url('edit/'.$item->nim)}}' class="btn btn-warning btn-sm">Edit</a> --}}
                        <form  onsubmit="return confirm('igin menghapus data ini?')" class='d-inline' action="{{ url('delete-prestasi/'.$item->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                    <a href='{{url('detail-Cms/'.$item->id)}}' class="btn btn-warning btn-sm">Detail</a>  
                    @endif
                    </td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
       {{ $data->links() }}
  </div>
  <!-- AKHIR DATA -->