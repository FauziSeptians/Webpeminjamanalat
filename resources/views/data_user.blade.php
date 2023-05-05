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

    <div class="container juduldata-user text-center mt-5" style="font-weight: 500;
    letter-spacing: 3px;
    font-size: 40px;">
        DATA PEMINJAMAN
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
            @foreach ($datapeminjam as $item)
            <tr id="data-user">
                <td>{{$item->namapeminjam}}</td>
                <td>{{$item->barangdipinjam}}</td>
                <td>{{date("d F",strtotime($item->tanggalpinjam))}}</td>
                <td>{{date("H:00",strtotime($item->waktuawalpinjam))}} -
                    {{date("H:00",strtotime($item->waktuakhirpinjam))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

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
