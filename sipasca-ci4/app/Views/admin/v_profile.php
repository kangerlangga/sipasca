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
<?= form_open_multipart('Dashboard/editProfile/'.$profil['id_pengguna']) ?>
<div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Username">Username</label>
            <input class="form-control" name="username" id="Username" value="<?= $profil['username']?>" disabled style="cursor: not-allowed">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Level">Level Pengguna</label>
            <input class="form-control" name="level" id="Level" value="<?= $profil['level']?>" disabled style="cursor: not-allowed">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input class="form-control" name="nama" id="Nama" value="<?= $profil['nama_pengguna']?>">
            <p class="text-danger"><?= isset($errors['nama']) == isset($errors['nama']) ? validation_show_error('nama') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Jabatan">Jabatan</label>
            <input class="form-control" name="jabatan" id="Jabatan" value="<?= $profil['jabatan']?>">
            <p class="text-danger"><?= isset($errors['jabatan']) == isset($errors['jabatan']) ? validation_show_error('jabatan') : '' ?></p>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            <label for="Alamat">Alamat Pengguna <b>(Contoh :  Jl. Jawa No.2 Sidoarjo. 62162)</b></label>
            <input class="form-control" name="alamat" id="Alamat" value="<?= $profil['alamat']?>">
            <p class="text-danger"><?= isset($errors['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Email-Pengguna">Email</label>
            <input class="form-control" name="email-Pengguna" id="Email-Pengguna" type="email" value="<?= $profil['email']?>">
            <p class="text-danger"><?= isset($errors['email-Pengguna']) == isset($errors['email-Pengguna']) ? validation_show_error('email-Pengguna') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Telp-Pengguna">Telepon Pengguna</label>
            <input class="form-control" name="telp-Pengguna" id="Telp-Pengguna" type="tel" value="<?= $profil['telepon']?>">
            <p class="text-danger"><?= isset($errors['telp-Pengguna']) == isset($errors['telp-Pengguna']) ? validation_show_error('telp-Pengguna') : '' ?></p>
        </div>
    </div>
    

</div>
<br>
<button type="submit" class="btn btn-primary">SIMPAN</button>
<a href="<?= base_url('Dashboard') ?>" class="btn btn-success" style="width: auto;">KEMBALI KE DASHBOARD</a>
<a href="<?= base_url('Dashboard/UbahPass') ?>" class="btn btn-danger" style="width: auto;">GANTI PASSWORD</a>
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