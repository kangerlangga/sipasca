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
<?= form_open_multipart('Infografis/insertDataInfografis') ?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="Sumber">URL Sumber Infografis</label>
            <input class="form-control" name="sumber" id="Sumber" type="url">
            <p class="text-danger"><?= isset($errors['sumber']) == isset($errors['sumber']) ? validation_show_error('sumber') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Gambar">Gambar Infografis (PNG, JPG, JPEG) <b>Maksimal 5 MB</b></label>
            <input class="form-control" name="gambar" id="Gambar" type="file" accept=".png, .jpg, .jpeg">
            <p class="text-danger"><?= isset($errors['gambar']) == isset($errors['gambar']) ? validation_show_error('gambar') : '' ?></p>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="form-group">
            <label for="Visibilitas">Visibilitas Infografis</label>
            <br>
            <select name='visibilitas' id='Visibilitas' class="form-control">
                <option name='visibilitas' value='Tampilkan'>Tampilkan</option>
                <option name='visibilitas' value='Sembunyikan'>Sembunyikan</option>
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