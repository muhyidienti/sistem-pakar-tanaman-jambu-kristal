<div class="col-lg-5 mt-3 mb-5">
    <div class="card-header"> <strong><i class="fas fa-utensils"></i> Pilih Makanan </strong> </div>
    <div class="row">
        <!-- Button trigger modal -->
        <?php foreach ($makanan as $m) : ?>
            <div class="card mt-4 ml-3 hover" style="width: 10rem; cursor:pointer;" onclick="pilih(<?= $m['id'] ?>)">
                <img src="<?= base_url('assets/images_upload/makanan/') . $m['gambar']; ?>" class="card-img-top">
                <div class="card-body ">
                    <h5 class="card-title"><?= $m['nama'] ?></h5>
                    <p class="card-text">Rp.<?= $m['harga'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>