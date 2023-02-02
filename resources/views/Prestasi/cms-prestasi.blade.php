<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h1>Prestasi</h1>
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('list-cms') }}" method="post">
        @csrf
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
<!-- Button trigger modal -->

<!-- Modal -->
<!-- TOMBOL TAMBAH DATA -->
<div class="pb-3">
  @if (Auth::User()->role == 1)
  <a href='{{ url('/create-prestasi')}}' class="btn btn-primary">+ Tambah Data</a>
  @endif
  <a href='{{ route('users.export')}}' class="btn btn-primary">+ Export Data</a>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    import data
  </button>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">import data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          masukan data yang ingin diimport
        </div>
        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" name="file" class="form-control">
          <br>
          <button class="btn btn-primary">unggah Data</button>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<table class="table table-striped">
      <thead>
          <tr>
              <th class="col-md-1">No</th>
              <th>Judul halaman</th>
          </tr>
      </thead>
      <tbody>
         <?php $i = 1 ?>
          @foreach ($data_prestasi as $item)
           <tr>
            <td>{{ $i++ }}</td>
            <td>{{$item->judul}}</td>
            <td>
              @if (Auth::User()->role == 1)
              <a href='{{url('edit-prestasi/'.$item->id)}}' class="btn btn-warning btn-sm">Edit</a>
              {{-- <a href='{{url('edit/'.$item->nim)}}' class="btn btn-warning btn-sm">Edit</a> --}}
              <form  onsubmit="return confirm('igin menghapus data ini?')" class='d-inline' action="{{ url('delete-prestasi/'.$item->id) }}"
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
    </div>
</div>
