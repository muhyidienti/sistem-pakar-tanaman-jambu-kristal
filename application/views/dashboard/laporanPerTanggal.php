<div class="col-lg-9 mt-3">
    <div class="card-header"> <strong>Laporan Transaksi pada Tanggal <?= $tanggal_['tanggal_transaksi'] ?> <i class="fas fa-coins"></i> </strong> </div>

    <!-- Button trigger modal -->

    <table id="datatabel_laporan" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Qty</th>


            </tr>
        </thead>
        <tbody>
            <?php foreach ($tanggal as $t) : ?>
                <tr>
                    <th class="font-weight-normal"><?= $t['kategori']  ?></th>
                    <th class="font-weight-normal"><?= $t['nama']  ?></th>
                    <th class="font-weight-normal"><?= $t['harga']  ?></th>
                    <th class="font-weight-normal"><?= $t['qty']  ?></th>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th class="text-right" colspan="4">Pendapatan Pada Tanggal <?= $tanggal_['tanggal_transaksi'] ?> yaitu sebesar: <?= $jumlah['jumlahHarga'] ?> </th>
            </tr>
        </tbody>
    </table>



</div>


</div>
</div>




<!-- sweet alert -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/js/brands.js"></script>
<script src="<?= base_url('assets') ?>/js/solid.js"></script>
<script src="<?= base_url('assets') ?>/js/fontawesome.js"></script>



</body>

</html>