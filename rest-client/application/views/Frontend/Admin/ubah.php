<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Film
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $film['id']; ?>">
                        <div class="form-group">
                            <label for="judul">Nama Film</label>
                            <input type="text" name="judul" class="form-control" id="judul" value="<?= $film['judul']; ?>">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Rilis</label>
                            <input type="text" name="tahun" class="form-control" id="tahun" value="<?= $film['tahun']; ?>">
                            <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" value="<?= $film['deskripsi']; ?>" cols="30" rows="10"></textarea>
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre Film</label>
                            <select class="form-control" id="genre" name="genre">
                                <?php foreach( $genre as $g ) : ?>
                                    <?php if( $g == $film['genre'] ) : ?>
                                        <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $g; ?>"><?= $g; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>