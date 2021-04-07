@extends('template')

@section('content')

    <div class="container mt-4">
    <h1>Barang</h1>
    @if (session('alert_message'))
      <div class="alert alert-success">
          {{ session('alert_message') }}
      </div>
    @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Gambar</th>
                <th>Jenis</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Toko</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- @php $no = 1; @endphp -->
              @foreach($data as $dt)
              <tr>
                <td>{{ $dt->id }}</td>
                <td>{{ $dt->nama_barang}}</td>
                <td><img src="/Uploads/{{$dt->foto}}" alt="Foto" width="100px"></td>
                <td>{{ $dt->jenis}}</td>
                <td>{{ $dt->deskripsi}}</td>
                <td>{{ $dt->harga}}</td>
                <td>{{ $dt->stok}}</td>
                <td>{{ $dt->nama_toko}}</td>
                <td>

                  <form action="{{ url('barang_destroy', $dt->id )}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ url('cart_create', $dt->id) }}" class="btn btn-sm btn-warning">Tambah ke Cart</a>
                    <a href="{{ url('barang_edit', $dt->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        <a href="{{url('barang_create')}}" class="btn btn-sm btn-success">Tambah data barang</a>
    </div>

    <div class="container">
        <a href="{{url('transaksi/clear_all_cart')}}" class="btn btn-danger">Clear Cart</a>
		    <span style="float:right"><b>Rp. {{Cart::getTotal()}}</b></span>
		    <table class="table table-hover table-striped">
		      <tr>
			      <th>NO</th>
            <th>Nama Barang</th>
            <th>Kuantitas</th>
            <th>Harga</th>
            <th>Aksi</th>
		      </tr>
            @php 
              $no=0; 
            @endphp
            @foreach(Cart::getContent() as $crt)
            @php 
              $no++; 
            @endphp
		      <tr>
            <td>{{$no}}</td>
            <td>{{$crt->nama_barang}}</td>
            <td>{{$crt->qty}}</td>
            <td>{{$crt->harga}}</td>
            <td>
            <a href="{{url('transaksi/hps_item/'.$crt->id)}}" class="btn btn-danger">X</a>
            </td>
		      </tr>
		        @endforeach
	      </table>
	      <a href="{{url('transaksi/simpan_cart_db')}}" class="btn btn-warning">simpan</a>
	    </div>	
    </div>

@stop