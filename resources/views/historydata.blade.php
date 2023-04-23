@extends('Parent.parent')


@section('content')

    <div class="container juduldata-history text-center mt-5">
        DATA HISTORY PEMINJAMAN
    </div>
    <table class="container table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Jam peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datahistory as $item)
                    <tr>
                        <td>{{$item->namapeminjam}}</td>
                        <td>{{$item->barangdipinjam}}</td>
                        <td>{{date("d F",strtotime($item->tanggalpinjam))}}</td>
                        <td>{{date("H:00",strtotime($item->waktuawalpinjam))}} -
                            {{date("H:00",strtotime($item->waktuakhirpinjam))}}</td>
                    </tr>
            
            @endforeach
        </tbody>
    </table>
@endsection