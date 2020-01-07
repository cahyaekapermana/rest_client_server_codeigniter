<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>C_Film/tambah" class="btn btn-primary">Tambah
                Data Film</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Film</h3>
          
            <ul class="list-group">
                <?php foreach ($film as $flm) : ?>
                <li class="list-group-item">
                    <?= $flm['judul']; ?>
                    <a href="<?= base_url(); ?>C_Film/hapus/<?= $flm['id']; ?>"
                        class="badge badge-danger float-right tombol-hapus">hapus</a>
                    <a href="<?= base_url(); ?>C_Film/ubah/<?= $flm['id']; ?>"
                        class="badge badge-success float-right">ubah</a>
                    <a href="<?= base_url(); ?>C_Film/detail/<?= $flm['id']; ?>"
                        class="badge badge-primary float-right">detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>