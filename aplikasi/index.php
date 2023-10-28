<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .striped:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <h1 class="mt-4 text-center">UAS 20.240.0137 - Muh Ibnu Haq</h1>
        <h1>Data Buku</h1>
        <table class="table" id="data-buku">
            <thead class="bg-success text-white font-weight-bold text-center">
                <tr>
                    <th>No</th>
                    <th>Buku ID</th>
                    <th>Judul Buku</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tempat-data">
                <!-- <tr>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <div class="container mx-auto p-5">
        <h1 class="mb-3">Form Buku</h1>
        <form id="form-buku">
            <div class="mb-3">
                <label for="buku_id" class="form-label">ID Buku</label>
                <input type="text" class="form-control mb-3" id="buku_id" name="buku_id">
                <input type="hidden" id="buku_id_old">

                <label for="judul_buku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control mb-3" id="judul_buku" name="judul_buku">

                <label for="status" class="form-label">Status Buku</label>
                <select name="status" class="form-control mb-3" id="status">
                    <option value="Ada">Ada</option>
                    <option value="Dipinjam">Dipinjam</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="simpanbuku">Simpan Data</button>
            <!-- <button type="button" class="btn btn-warning" id="updatebuku">Update Data</button> -->
        </form>
    </div>


    <div class="container mx-auto p-5">
        <h1 class="mb-3">Form Pinjam</h1>
        <form id="form-pinjam">
            <div class="mb-3">
                <label for="buku_id" class="form-label">ID Buku</label>
                <input type="text" class="form-control mb-1" id="buku_id" name="buku_id"">

                <label for=" tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control mb-3" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= date('Y-m-d'); ?>">

                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control mb-3" id="nama_peminjam" name="nama_peminjam">
            </div>
            <button type="button" class="btn btn-primary" id="simpanpinjam">Simpan Data</button>
            <!-- <button type="button" class="btn btn-warning" id="updatepinjam">Update Data</button> -->
        </form>
    </div>

    <div class="container mx-auto p-5">
        <h1 class="mb-3">Form Kembali</h1>
        <form id="form-kembali">
            <div class="mb-3">
                <label for="buku_id" class="form-label">ID Buku</label>
                <input type="text" class="form-control mb-1" id="buku_id" name="buku_id">

                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control mb-3" id="tanggal_kembali" name="tanggal_kembali" value="<?= date('Y-m-d'); ?>">

            </div>
            <button type="button" class="btn btn-primary" id="simpankembali">Simpan Data</button>
            <!-- <button type="button" class="btn btn-warning" id="updatekembali">Update Data</button> -->
        </form>
    </div>
    <script>
        function tampilData() {
            $.ajax({
                method: 'GET',
                url: 'http://localhost/wsa/basic/web/buku',
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    let data = '';
                    let no = 1;
                    $.each(result, function(key, value) {
                        // $("#data").after(
                        data += '<tr class="border-bottom striped text-center">';
                        data += '<td class="p-2">' + no + '</td>';
                        data += '<td class="p-2">' + value.buku_id + '</td>';
                        data += '<td class="p-2 text-start">' + value.judul_buku + '</td>';
                        data += '<td class="p-2">' + value.status + '</td>';
                        data += '</tr>';
                        // );
                        no++;
                    });
                    // console.log(data);
                    $('#tempat-data').html(data);
                    // $("#data").remove();
                }
            });
        }
        $(document).ready(function() {
            tampilData();
        });
        $(document).on('click', '#simpanbuku', function() {
            let data = $('#form-buku').serialize();
            $.ajax({
                method: 'POST',
                url: 'http://localhost/wsa/basic/web/buku',
                data: data,
                success: function(result) {
                    // console.log(result);
                    tampilData();
                    $('#form-buku').trigger('reset');
                    alert("Berhasil Menambahkan Data buku!");
                }
            });
        });
        $(document).on('click', '#simpanpinjam', function() {
            let data = $('#form-pinjam').serialize();
            $.ajax({
                method: 'POST',
                url: 'http://localhost/wsa/basic/web/pinjam',
                data: data,
                success: function(result) {
                    // console.log(result);
                    tampilData();
                    $('#form-pinjam').trigger('reset');
                    alert("Berhasil Menambahkan Data pinjam!");
                }
            });
        });
        $(document).on('click', '#simpankembali', function() {
            let data = $('#form-kembali').serialize();
            $.ajax({
                method: 'POST',
                url: 'http://localhost/wsa/basic/web/kembali',
                data: data,
                success: function(result) {
                    // console.log(result);
                    tampilData();
                    $('#form-kembali').trigger('reset');
                    alert("Berhasil Menambahkan Data!");
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>