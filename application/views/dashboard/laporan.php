<div class="col-lg-9 mt-3">
    <div class="card-header"> <strong>Laporan Transaksi <i class="fas fa-coins"></i> </strong> </div>

    <table class="table table-striped table-bordered mt-3" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tanggal_laporan as $tl) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <th><?= $tl['tanggal_transaksi'] ?></th>
                    <th> <a href="<?= base_url('dashboard/tampil_laporan_pertanggal/') . $tl['tanggal_transaksi'] ?>" class="btn btn-info">Lihat</a> </th>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <center>
        <canvas id="grafikPenjualan"></canvas>
    </center>
</div>
</div>
</div>

<!-- sweet alert -->
<script>
    var ctx = document.getElementById("grafikPenjualan").getContext('2d');
    var mychart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php while ($dataGrafik->fetch_array()) {
                            echo '"' . $dataGrafik['nama'] . '",';
                        } ?>],
            datasets: [{
                label: '# of Votes',
                data: [<?php while ($dataGrafik) {
                            echo '"' . $dataGrafik['jumlahHarga'] . '",';
                        } ?>],
                backgroundColor: ['#7FFFD4', '#17BEBB', '#FFC914', '#7FFF00', '#9932CC', '#008000', '#17BEBB'],
                borderWith: 1
            }]

        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets') ?>/js/brands.js"></script>
<script src="<?= base_url('assets') ?>/js/solid.js"></script>
<script src="<?= base_url('assets') ?>/js/fontawesome.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/crud_laporan.js') ?>"></script>


</body>

</html>