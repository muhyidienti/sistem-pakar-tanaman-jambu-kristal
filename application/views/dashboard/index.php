<div class="col-lg-9 mt-3">
    <div class="card-header"> <strong>Kelola Data Gejala <i class="fas fa-shield-virus"></i> </strong> </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus-circle"></i> Tambah Data
    </button>

    <table id="datatabel_gejala" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="5%">Kode Gejala</th>
                <th width="78%">Nama Gejala</th>
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> Tambah Data Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cancel()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form type="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_gejala" name="id_gejala">
                        <label for="inputAddress">Kode Gejala</label>
                        <input type="text" class="form-control" id="kode_gejala" name="kode_gejala">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nama Gejala</label>
                        <input type="text" class="form-control" id="nama_gejala" name="nama_gejala">
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