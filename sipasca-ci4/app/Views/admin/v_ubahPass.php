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
<?= form_open_multipart('Dashboard/gantiPass/'.$profil['id_pengguna']) ?>
<div class="row">

    <div class="col-sm-12">
        <div class="form-group">
            <label for="Old-Pass">Password Lama</label>
            <input class="form-control" name="old-Pass" id="Old-Pass" type="password">
            <p class="text-danger"><?= isset($errors['old-Pass']) == isset($errors['old-Pass']) ? validation_show_error('old-Pass') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="New-Pass">Password Baru</label>
            <input class="form-control" name="new-Pass" id="New-Pass" type="password">
            <p class="text-danger"><?= isset($errors['new-Pass']) == isset($errors['new-Pass']) ? validation_show_error('new-Pass') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Confirm-Pass">Konfirmasi Password Baru</label>
            <input class="form-control" name="confirm-Pass" id="Confirm-Pass" type="password">
            <p class="text-danger"><?= isset($errors['confirm-Pass']) == isset($errors['confirm-Pass']) ? validation_show_error('confirm-Pass') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="lihat-password">
            <label class="form-check-label" for="lihat-password">Tampilkan Password</label>
        </div>
    </div>


</div>
<br>
<button type="submit" class="btn btn-danger" style="width: auto;">GANTI PASSWORD</button>
<a href="<?= base_url('Dashboard/profil') ?>" class="btn btn-success">KEMBALI</a>
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

    <?php
    $tipe = session()->getFlashdata('type');
    if ( $tipe == 'error') : ?>
        Swal.fire({
        icon: '<?= $tipe; ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        showConfirmButton: false,
        timer: 3000
        })
    <?php endif ?>

    $(document).ready(function() {
        $('#lihat-password').click(function() {
            if ($(this).is(':checked')) {
                $('#Old-Pass').attr('type', 'text');
                $('#New-Pass').attr('type', 'text');
                $('#Confirm-Pass').attr('type', 'text');
            } else {
                $('#Old-Pass').attr('type', 'password');
                $('#New-Pass').attr('type', 'password');
                $('#Confirm-Pass').attr('type', 'password');
            }
        });
    })

</script>