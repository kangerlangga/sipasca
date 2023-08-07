<style>
    .form-group {
        margin-top: 17px;
    }
    .form-group input, select{
        margin-top: 3px;
    }
    .btn {
        width: 100px;
        margin-right: 5px;
    }
</style>

<?php $errors = validation_errors()?>
<?= form_open_multipart('Pengguna/insertDataPengguna') ?>
<div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Username">Username</label>
            <input class="form-control" name="username" id="Username">
            <p class="text-danger"><?= isset($errors['username']) == isset($errors['username']) ? validation_show_error('username') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input class="form-control" name="nama" id="Nama">
            <p class="text-danger"><?= isset($errors['nama']) == isset($errors['nama']) ? validation_show_error('nama') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label for="Alamat">Alamat Pengguna <b>(Contoh :  Jl. Jawa No.2 Sidoarjo. 62162)</b></label>
            <input class="form-control" name="alamat" id="Alamat">
            <p class="text-danger"><?= isset($errors['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Jabatan">Jabatan</label>
            <input class="form-control" name="jabatan" id="Jabatan">
            <p class="text-danger"><?= isset($errors['jabatan']) == isset($errors['jabatan']) ? validation_show_error('jabatan') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Email-Pengguna">Email</label>
            <input class="form-control" name="email-Pengguna" id="Email-Pengguna" type="email">
            <p class="text-danger"><?= isset($errors['email-Pengguna']) == isset($errors['email-Pengguna']) ? validation_show_error('email-Pengguna') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Telp-Pengguna">Telepon Pengguna</label>
            <input class="form-control" name="telp-Pengguna" id="Telp-Pengguna" type="tel">
            <p class="text-danger"><?= isset($errors['telp-Pengguna']) == isset($errors['telp-Pengguna']) ? validation_show_error('telp-Pengguna') : '' ?></p>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="form-group">
            <label for="Level">Level Pengguna</label>
            <br>
            <select name='level' id='Level' class="form-control">
                <option name='level' value='Admin'>Admin</option>
                <option name='level' value='Super Admin'>Super Admin</option>
	        </select>
        </div>
    </div>

</div>
<br>
<button type="submit" class="btn btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-success">RESET</button>
<?= form_close() ?>
<hr>

<script type="text/javascript">
    <?php
    $tipe = session()->getFlashdata('type');
    if ( $tipe == 'success') : ?>
        Swal.fire({
        icon: '<?= $tipe; ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        showConfirmButton: false,
        timer: 3000
        })
    <?php endif ?>

</script>