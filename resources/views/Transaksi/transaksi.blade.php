@extends('template')

@section('content')

    <div class="container mt-4">

    <h1>Seller</h1>
          @if (session('alert_message'))
          <div class="alert alert-success">
              {{ session('alert_message') }}
          </div>
          @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- @php $no = 1; @endphp -->
              @foreach($data as $dt)
              <tr>
                <td>{{ $dt->id }}</td>
                <td>{{ $dt->nama}}</td>
                <td>{{ $dt->telp}}</td>
                <td>{{ $dt->email}}</td>
                <td>{{ $dt->level}}</td>
                <td>

                  <form action="{{ url('seller_destroy', $dt->id )}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ url('seller_edit', $dt->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        <a href="{{url('seller_create')}}" class="btn btn-sm btn-success">Tambah data seller</a>
    </div>

@stop