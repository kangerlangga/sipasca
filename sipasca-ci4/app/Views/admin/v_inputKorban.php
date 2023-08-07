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
<?= form_open_multipart('Korban/insertDataKorban') ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="No-ID">Nomor Identitas Korban</label>
            <input class="form-control" name="no-ID" id="No-ID">
            <p class="text-danger"><?= isset($errors['no-ID']) == isset($errors['no-ID']) ? validation_show_error('no-ID') : '' ?></p>
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
            <label for="Alamat">Alamat Korban <b>(Contoh :  Jl. Jawa No.2 Sidoarjo. 62162)</b></label>
            <input class="form-control" name="alamat" id="Alamat">
            <p class="text-danger"><?= isset($errors['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Jk">Jenis Kelamin</label>
            <br>
            <select name='jk' id='Jk' class="form-control">
                <option name='jk' value='Laki - Laki'>Laki - Laki</option>
                <option name='jk' value='Perempuan'>Perempuan</option>
	        </select>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="form-group">
            <label for="Kategori">Kategori Korban</label>
            <br>
            <select name='kategori' id='Kategori' class="form-control">
                <option name='kategori' value='Korban Selamat'>Korban Selamat</option>
                <option name='kategori' value='Korban Luka Ringan'>Korban Luka Ringan</option>
                <option name='kategori' value='Korban Luka Berat'>Korban Luka Berat</option>
                <option name='kategori' value='Korban Tewas'>Korban Tewas</option>
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