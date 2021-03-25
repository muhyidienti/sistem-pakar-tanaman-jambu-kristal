<div class="col-lg-4 mt-3">
    <div class="card-header"> <strong><i class="fas fa-cash-register"></i> Transaksi </strong> </div>

    <table id="datatabel_transaksi" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Nama Pilihan </th>
                <th>Banyak </th>
                <th>Harga </th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>




    <table id="datatabel_jumlahHarga" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Jumlah Harga </th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


    <div class="row mt-2 ">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="bayar" name="bayar" placeholder="Bayar">
        </div>
        <button class="btn btn-info mb-2" onclick="bayar()">Proses</button>
    </div>

    <div class="row mt-2 ">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="kembalian" name="kembalian" value="Kembalian">
        </div>
    </div>
    <a href="<?= base_url('transaksi/export') ?>" class="btn btn-info mb-2"> <i class="fa fa-print"></i> Print</a>

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
<script type="text/javascript" src="<?= base_url('assets/js/transaksi.js') ?>"></script>


</body>

</html>