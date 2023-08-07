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
<?= form_open_multipart('Infografis/editDataInfografis/'.$infografis['id_infografis']) ?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="Sumber">URL Sumber Infografis</label>
            <input class="form-control" name="sumber" id="Sumber" value="<?= $infografis['link_sumber']?>">
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
            <?php if ($infografis['visibilitas']=='Tampilkan') {
                echo "
                <option name='visibilitas' value='Tampilkan' selected>Tampilkan</option>
                <option name='visibilitas' value='Sembunyikan'>Sembunyikan</option>";
            }elseif ($infografis['visibilitas']=='Sembunyikan') {
                echo "
                <option name='visibilitas' value='Tampilkan'>Tampilkan</option>
                <option name='visibilitas' value='Sembunyikan' selected>Sembunyikan</option>";
            }  
            ?>
	        </select>
        </div>
    </div>

</div>
<br>
<button type="submit" class="btn btn-primary">SIMPAN</button>
<a href="<?= base_url('Infografis') ?>" class="btn btn-success tbl-kembali">KEMBALI</a>
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

    $(document).on('click','.tbl-kembali',function(e) {

    //Hentikan aksi default
    e.preventDefault();
    const href1 = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Tidak Akan Disimpan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#fd7e14',
            confirmButtonText: 'KEMBALI',
            cancelButtonText: 'BATAL'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href1;
            }
        })
    })

</script>