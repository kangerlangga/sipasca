<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-bordered pt-3" id="tabel-korban">
        <colgroup>
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 30%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 15%;">
        </colgroup>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Korban</th>
                    <th>Alamat</th>
                    <th>Kategori</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomer = 1; 
                foreach ($korban as $key => $value) { ?>
                    <tr>
                        <td><?= $nomer++ ?></td>
                        <td><?= $value['nama_korban'] ?></td>
                        <td><?= $value['alamat_korban'] ?></td>
                        <td><?= $value['kategori_korban'] ?></td>
                        <td><?= $value['jk_korban'] ?></td>
                        <td>
                            <a href="<?= base_url('Korban/editKorban/'.$value['nik_korban'])?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('Korban/hapusKorban/'.$value['nik_korban'])?>" class="btn btn-danger tbl-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    let table = new DataTable('#tabel-korban');

    $(document).on('click','.tbl-hapus',function(e) {

        //Hentikan aksi default
        e.preventDefault();
        const href1 = $(this).attr('href');

        Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Ini Akan Dihapus Secara Permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#fd7e14',
        confirmButtonText: 'HAPUS DATA',
        cancelButtonText: 'BATAL'
        }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href1;
        }
        })
    })

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