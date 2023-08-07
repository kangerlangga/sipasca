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
<?= form_open_multipart('Kebutuhan/editDataKebutuhan/'.$kebutuhan['id_kebutuhan']) ?>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="Barang">Nama Barang</label>
            <input class="form-control" name="barang" id="Barang" value="<?= $kebutuhan['nama_barang']?>">
            <p class="text-danger"><?= isset($errors['barang']) == isset($errors['barang']) ? validation_show_error('barang') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Jumlah">Jumlah Yang Dibutuhkan <b>(Hanya Angka)</b></label>
            <input class="form-control" name="jumlah" id="Jumlah" type="number" min="1" value="<?= $kebutuhan['jumlah']?>">
            <p class="text-danger"><?= isset($errors['jumlah']) == isset($errors['jumlah']) ? validation_show_error('jumlah') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Satuan">Satuan Jumlah <b>(Contoh : Kilogram, Kardus, Ton)</b></label>
            <input class="form-control" name="satuan" id="Satuan" value="<?= $kebutuhan['satuan']?>">
            <p class="text-danger"><?= isset($errors['satuan']) == isset($errors['satuan']) ? validation_show_error('satuan') : '' ?></p>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="Kategori">Kategori Kebutuhan</label>
            <br>
            <select name='kategori' id='Kategori' class="form-control">
            <?php if ($kebutuhan['kategori']=='Bahan Makanan') {
                echo "
                <option name='kategori' value='Bahan Makanan' selected>Bahan Makanan</option>
                <option name='kategori' value='Pakaian'>Pakaian</option>
                <option name='kategori' value='Material Bangunan'>Material Bangunan</option>
                <option name='kategori' value='Lainnya'>Lainnya</option>";
            }elseif ($kebutuhan['kategori']=='Pakaian') {
                echo "
                <option name='kategori' value='Bahan Makanan'>Bahan Makanan</option>
                <option name='kategori' value='Pakaian' selected>Pakaian</option>
                <option name='kategori' value='Material Bangunan'>Material Bangunan</option>
                <option name='kategori' value='Lainnya'>Lainnya</option>";
            }elseif ($kebutuhan['kategori']=='Material Bangunan') {
                echo "
                <option name='kategori' value='Bahan Makanan'>Bahan Makanan</option>
                <option name='kategori' value='Pakaian'>Pakaian</option>
                <option name='kategori' value='Material Bangunan' selected>Material Bangunan</option>
                <option name='kategori' value='Lainnya'>Lainnya</option>";
            }elseif ($kebutuhan['kategori']=='Lainnya') {
                echo "
                <option name='kategori' value='Bahan Makanan'>Bahan Makanan</option>
                <option name='kategori' value='Pakaian'>Pakaian</option>
                <option name='kategori' value='Material Bangunan'>Material Bangunan</option>
                <option name='kategori' value='Lainnya' selected>Lainnya</option>";
            }  
            ?>
	        </select>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label for="Keterangan">Keterangan <b>(Sasaran Kebutuhan)</b></label>
            <input class="form-control" name="keterangan" id="Keterangan" value="<?= $kebutuhan['keterangan']?>">
            <p class="text-danger"><?= isset($errors['keterangan']) == isset($errors['keterangan']) ? validation_show_error('keterangan') : '' ?></p>
        </div>
    </div>

</div>
<br>
<button type="submit" class="btn btn-primary">SIMPAN</button>
<a href="<?= base_url('Kebutuhan') ?>" class="btn btn-success tbl-kembali">KEMBALI</a>
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