@extends('Parent.parent')

@section('content')
<div class="wrapper">
    <div class="container kotak-konten">
        <form action="{{url('/data')}}" method="post">
            @csrf
            <div class="judul text-center">
                <h1>FORM PEMINJAMAN BARANG MASAK</h1>
            </div>

            <div class="mb-3 mt-5">
                <label for="formGroupExampleInput" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Nama" name="namapeminjam">
            </div>
            <div class="input-barang mb-3">
                <div class="barang-dipinjam mb-1">
                    Barang Pinjaman
                </div>
                <select class="form-select" aria-label="Default select example" name="barangdipinjam">
                    <option value="Rice Cooker">Rice Cooker</option>
                    <option value="Air Fryer">Air Fryer</option>
                    <option value="Keduanya">Keduanya</option>
                </select>

            </div>

            <div class="waktu-peminjaman mb-3">
                <div class="judul-peminjaman mb-1">
                    Tanggal Peminjaman
                </div>
                <div class="row form-group">
                    <label for="date" class="col-sm-1 col-form-label">Date</label>
                    <div class="col-sm-4">
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" name="tanggalpinjam">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="jam-peminjaman mb-4">
                <div class="judul-peminjaman mb-1">
                    Waktu Peminjaman
                </div>
                <div class="row">
                    <div class="col">
                        <div class="Jam awal pinjam">
                            Jam awal pinjam
                        </div>

                        <div class="cs-form mt-1">
                            <input type="time" class="form-control" value="10:05 AM" name="waktuawalpinjam"/>
                        </div>

                    </div>
                    <div class="col">
                        <div class="Jam awal pinjam">
                            Jam akhir pinjam
                        </div>

                        <div class="cs-form">
                            <input type="time" class="form-control" value="10:05 AM" name="waktuakhirpinjam"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button mt-3">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
        </form>

    </div>
</div>
@endsection

    

