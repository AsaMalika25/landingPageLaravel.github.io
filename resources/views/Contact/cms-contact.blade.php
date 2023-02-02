<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h1>Contact</h1>
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="" method="post">
            @csrf
              <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            {{-- @if (Auth::User()->role == 1) --}}
          {{-- <a href='{{ url('/create-kompetensi')}}' class="btn btn-primary">+ Tambah Data</a> --}}
          {{-- @endif --}}
        </div>
  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">nama</th>
                    <th>email</th>
                    <th>subject</th>
                    <th>message</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach ($data_contact as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    {{-- <td><image alt="img"width="150px"src="{{ url('public/image/'.$item->nama_banner) }}"></td> --}}
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->message }}</td>
                    <td>
                        @if (Auth::User()->role == 1)
                            
                        <a href='{{url('sendfeedback/'.$item->email)}}' class="btn btn-warning btn-sm">balas</a>
                        {{-- <a href='{{url('edit/'.$item->nim)}}' class="btn btn-warning btn-sm">Edit</a> --}}
                        <form  onsubmit="return confirm('igin menghapus data ini?')" class='d-inline' action="{{ url('delete-contact/'.$item->id) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                    @endif
                    {{-- <a href='{{url('detail-Cms/'.$item->id)}}' class="btn btn-warning btn-sm">Detail</a>   --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       {{ $data->links() }}
    </div>
  <!-- AKHIR DATA -->