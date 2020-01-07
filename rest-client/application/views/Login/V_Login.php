<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    
    <div class="card">

        <!-- Alert -->
        <?php if ($this->session->flashdata('category_error')) { ?>
            <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
        <?php } ?>
        
        <div class="card-body">
            <div style="padding:100px">
                <!-- link ke controller/fungsi login -->
                <form action="<?php echo site_url('C_Login/c_proses_login')?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input class="form-control" placeholder="Masukan Username"name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" placeholder="Masukan Password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

