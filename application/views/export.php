<html>

<head>
    <title>Struk Pembelian</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Print Transaksi</h2>
        <a href="<?= base_url('transaksi/bersihkan_data'); ?>" style="text-decoration: none; color:black" class="font-weight-bold mb-2">Rumah Makan Berkah</a>
        <div class="data-tables datatable-dark">

            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table id="datatabel_transaksi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Pilihan </th>
                        <th>Banyak </th>
                        <th>Harga </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_export as $d) : ?>
                        <tr>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['qty'] ?></td>
                            <td class="text-right">Rp. <?= $d['harga'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="font-weight-bold">
                    <tr>
                        <td colspan="2">
                            Jumlah Pembelian
                        </td>
                        <td class="text-right">
                            Rp.<?= $jumlah_pilihan->jumlahHarga; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Bayar
                        </td>
                        <td class="text-right">
                            Rp.<?= $bayar ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Kembalian
                        </td>
                        <td class="text-right">
                            Rp.<?= $kembalian ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script>
        window.print();
    </script>
    <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>