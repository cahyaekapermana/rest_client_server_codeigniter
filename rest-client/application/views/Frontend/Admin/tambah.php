<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Film
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="judul">Nama Film</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Rilis</label>
                            <input type="text" name="tahun" class="form-control" id="tahun">
                            <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" id="deskripsi"></textarea>
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre Film</label>
                            <select class="form-control" id="genre" name="genre">
                                <option value="Action">Action</option>
                                <option value="Horor">Horor</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Drama">Drama</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>