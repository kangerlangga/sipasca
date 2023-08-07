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
<?= form_open_multipart('Korban/editDataKorban/'.$korban['nik_korban']) ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="No-ID">Nomor Identitas Korban</label>
            <input class="form-control" name="no-ID" id="No-ID" value="<?= $korban['nik_korban']?>" disabled style="cursor: not-allowed">
            <p class="text-danger"><?= isset($errors['no-ID']) == isset($errors['no-ID']) ? validation_show_error('no-ID') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input class="form-control" name="nama" id="Nama" value="<?= $korban['nama_korban']?>">
            <p class="text-danger"><?= isset($errors['nama']) == isset($errors['nama']) ? validation_show_error('nama') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label for="Alamat">Alamat Korban <b>(Contoh :  Jl. Jawa No.2 Sidoarjo. 62162)</b></label>
            <input class="form-control" name="alamat" id="Alamat" value="<?= $korban['alamat_korban']?>">
            <p class="text-danger"><?= isset($errors['alamat']) == isset($errors['alamat']) ? validation_show_error('alamat') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Jk">Jenis Kelamin</label>
            <br>
            <select name='jk' id='Jk' class="form-control">
            <?php if ($korban['jk_korban']=='Laki - Laki') {
                echo "
                <option name='jk' value='Laki - Laki' selected>Laki - Laki</option>
                <option name='jk' value='Perempuan'>Perempuan</option>";
            }elseif ($korban['jk_korban']=='Perempuan') {
                echo "
                <option name='jk' value='Laki - Laki'>Laki - Laki</option>
                <option name='jk' value='Perempuan' selected>Perempuan</option>";
            }  
            ?>
	        </select>
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="form-group">
            <label for="Kategori">Kategori Korban</label>
            <br>
            <select name='kategori' id='Kategori' class="form-control">
            <?php if ($korban['kategori_korban']=='Korban Selamat') {
                echo "
                <option name='kategori' value='Korban Selamat' selected>Korban Selamat</option>
                <option name='kategori' value='Korban Luka Ringan'>Korban Luka Ringan</option>
                <option name='kategori' value='Korban Luka Berat'>Korban Luka Berat</option>
                <option name='kategori' value='Korban Tewas'>Korban Tewas</option>";
            }elseif ($korban['kategori_korban']=='Korban Luka Ringan') {
                echo "
                <option name='kategori' value='Korban Selamat'>Korban Selamat</option>
                <option name='kategori' value='Korban Luka Ringan' selected>Korban Luka Ringan</option>
                <option name='kategori' value='Korban Luka Berat'>Korban Luka Berat</option>
                <option name='kategori' value='Korban Tewas'>Korban Tewas</option>";
            }elseif ($korban['kategori_korban']=='Korban Luka Berat') {
                echo "
                <option name='kategori' value='Korban Selamat'>Korban Selamat</option>
                <option name='kategori' value='Korban Luka Ringan'>Korban Luka Ringan</option>
                <option name='kategori' value='Korban Luka Berat' selected>Korban Luka Berat</option>
                <option name='kategori' value='Korban Tewas'>Korban Tewas</option>";
            }elseif ($korban['kategori_korban']=='Korban Tewas') {
                echo "
                <option name='kategori' value='Korban Selamat'>Korban Selamat</option>
                <option name='kategori' value='Korban Luka Ringan'>Korban Luka Ringan</option>
                <option name='kategori' value='Korban Luka Berat'>Korban Luka Berat</option>
                <option name='kategori' value='Korban Tewas' selected>Korban Tewas</option>";
            }  
            ?>
	        </select>
        </div>
    </div>

</div>
<br>
<button type="submit" class="btn btn-primary">SIMPAN</button>
<a href="<?= base_url('Korban') ?>" class="btn btn-success tbl-kembali">KEMBALI</a>
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