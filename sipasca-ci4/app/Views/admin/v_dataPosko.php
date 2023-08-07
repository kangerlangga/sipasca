<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-bordered pt-3" id="tabel-kebutuhan">
        <colgroup>
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 15%;">
        </colgroup>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Petugas</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomer = 1; 
                foreach ($posko as $key => $value) { ?>
                    <tr>
                        <td><?= $nomer++ ?></td>
                        <td><?= $value['identitas_posko'] ?></td>
                        <td><?= $value['alamat_posko'] ?></td>
                        <td><?= $value['nama_petugas'] ?></td>
                        <td><?= $value['telepon_petugas'] ?></td>
                        <td>
                            <a href="<?= base_url('PoskoFaskes/editPosko/'.$value['id_posko'])?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('PoskoFaskes/hapusPosko/'.$value['id_posko'])?>" class="btn btn-danger tbl-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    let table = new DataTable('#tabel-kebutuhan');

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