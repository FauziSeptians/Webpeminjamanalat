<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="overlay-upadate" id="Overlay">
        <div class="konten-update">
            <div class="exit" id="exits">
                <div class="btn button-exits" onclick="window.location = '{{'/data'}}'">
                    <
                </div>
            </div>
      
            <form action = "/update/{{$update['id']}}" method="get">
                @csrf
                <div class="judul text-center">
                    <h1>FORM PEMINJAMAN BARANG MASAK</h1>
                </div>
    
                <div class="mb-3 mt-5">
                    <label for="formGroupExampleInput" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Input Nama" name="namapeminjam" value="{{$update['namapeminjam']}}">
                </div>
                <div class="input-barang mb-3">
                    <div class="barang-dipinjam mb-1">
                        Barang Pinjaman
                    </div>
                    <select class="form-select" aria-label="Default select example" name="barangdipinjam" id="select-bar">
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
                                <input type="text" class="form-control" name="tanggalpinjam" value="{{$update['tanggalpinjam']}}">
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
                                <input type="time" class="form-control" value="{{$update['waktuawalpinjam']}}" name="waktuawalpinjam"/>
                            </div>
    
                        </div>
                        <div class="col">
                            <div class="Jam awal pinjam">
                                Jam akhir pinjam
                            </div>
    
                            <div class="cs-form">
                                <input type="time" class="form-control" value="{{$update['waktuakhirpinjam']}}" name="waktuakhirpinjam"/>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row pembagian-button ">
                    <div class="col posisi-button mt-3" >
                        <button type="submit" class="btn button-submit btn-md" name="update" value="1">Update</button>
                    </div>
                    <div class="col posisi-button mt-3">
                        <button type="submit" class="btn button-delete btn-md" name="delete" value="1">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    




















    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker();
        });

    </script>


</body>

</html>
