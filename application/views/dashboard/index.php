<div class="col-lg-9 mt-3">
    <div class="card-header"> <strong>Kelola Data Gejala <i class="fas fa-shield-virus"></i> </strong> </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus-circle"></i> Tambah Data
    </button>

    <table id="datatabel_makanan" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Tambah Data Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cancel()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_tambah" enctype="multipart/form-data">
                    <div class="form-row">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="Makanan" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nama Makanan</label>
                            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Harga</label>
                        <input type="text" class="form-control" id="harga_makanan" name="harga_makanan">
                    </div>
                    <div class="form-group">
                        <label for="gambar_makanan">Pilih Gambar</label>
                        <input type="file" class="form-control-file" id="gambar_makanan" name="gambar_makanan">
                    </div>

            </div>
            <div class="modal-footer" id="button_">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnsubmit" class="btn btn-info">Save Data</button>
            </div>
            </form>
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
<script type="text/javascript" src="<?= base_url('assets/js/crud_makanan.js') ?>"></script>


</body>

</html>