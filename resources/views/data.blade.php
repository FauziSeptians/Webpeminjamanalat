@extends('Parent.parent')

@section('content')
    <div class="container juduldata text-center mt-5">
        DATA PEMINJAMAN
    </div>
    <div class="container mt-5">
        <form action="{{url('/search')}}" method="get">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Search" name="search">
        </form>
    </div>
    <table class="container table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Jam peminjaman</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($datapeminjam as $item)
                <tr>
                        <td class = "namapeminjam">{{$item->namapeminjam}}</td>
                        <td class = "barangdipinjam">{{$item->barangdipinjam}}</td>
                        <td>{{date("d F",strtotime($item->tanggalpinjam))}}</td>
                        <td>{{date("H:00",strtotime($item->waktuawalpinjam))}} -
                            {{date("H:00",strtotime($item->waktuakhirpinjam))}}</td>
                        <td>  
                            <a href="/data/update/{{$item->namapeminjam}}/{{$item->barangdipinjam}}/{{$item->tanggalpinjam}}/{{$item->waktuawalpinjam}}/{{$item->waktuakhirpinjam}}">
                                Change
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- @dd($update) --}}


@endsection

    

