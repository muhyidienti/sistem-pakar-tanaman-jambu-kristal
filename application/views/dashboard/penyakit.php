<div class="col-lg-9 mt-3">
    <div class="card-header"> <strong>Kelola Data Penyakit <i class="fas fa-clipboard-list"></i> </strong> </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus-circle"></i> Tambah Data
    </button>

    <table id="datatabel_penyakit" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Tambah Data Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cancel()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form type="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id">
                        <label for="inputAddress">Kode Penyakit</label>
                        <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nama Penyakit</label>
                        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit">
                    </div>
                </div>
                <div class="modal-footer" id="button_">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="form_tambah()" class="btn btn-info">Submit Data</button>
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
<script type="text/javascript" src="<?= base_url('assets/js/crud_penyakit.js') ?>"></script>


</body>

</html>