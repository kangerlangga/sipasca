<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-bordered pt-3" id="tabel-bangunan">
        <colgroup>
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 65%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 15%;">
        </colgroup>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Visibilitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomer = 1; 
                foreach ($infografis as $key => $value) { ?>
                    <tr>
                        <td><?= $nomer++ ?></td>
                        <td><center><img src="<?= base_url('foto/infografis/'.$value['gambar_infografis'])?>" width="95%"></center></td>
                        <td><?= $value['visibilitas'] ?></td>
                        <td>
                            <a href="<?= base_url('Infografis/editInfografis/'.$value['id_infografis'])?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('Infografis/hapusInfografis/'.$value['id_infografis'])?>" class="btn btn-danger tbl-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    let table = new DataTable('#tabel-bangunan');

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