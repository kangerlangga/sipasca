<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-bordered pt-3" id="tabel-pengguna">
        <colgroup>
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 15%;">
            <col span="1" style="width: 30%;">
            <col span="1" style="width: 13%;">
            <col span="1" style="width: 17%;">
        </colgroup>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomer = 1; 
                foreach ($pengguna as $key => $value) { ?>
                    <tr>
                        <td><?= $nomer++ ?></td>
                        <td><?= $value['nama_pengguna'] ?></td>
                        <td><?= $value['username'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['telepon'] ?></td>
                        <td>
                            <a href="<?= base_url('Pengguna/resetPassPengguna/'.$value['id_pengguna'])?>" class="btn btn-info tbl-resetpass"><i class="fa-solid fa-rotate-left"></i></a>
                            <a href="<?= base_url('Pengguna/editPengguna/'.$value['id_pengguna'])?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="<?= base_url('Pengguna/hapusPengguna/'.$value['id_pengguna'])?>" class="btn btn-danger tbl-hapus"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    let table = new DataTable('#tabel-pengguna');

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

        $(document).on('click','.tbl-resetpass',function(e) {

        //Hentikan aksi default
        e.preventDefault();
        const href1 = $(this).attr('href');

        Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Password Pengguna Akan Di Reset!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#fd7e14',
        confirmButtonText: 'RESET PASSWORD',
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

    <?php
    $psn = session()->getFlashdata('pesan');
    if ( $psn == 'Akun Berhasil Dihapus!') : ?>
        Swal.fire({
        icon: '<?=session()->getFlashdata('type'); ?>',
        title: '<?= session()->getFlashdata('pesan'); ?>',
        text: 'Anda Akan Logout Dalam Beberapa Detik!',
        showConfirmButton: false,
        timer: 5000
        })
        setTimeout(
        function(){
            window.location = "<?= base_url('Logout')?>" 
        },
        5000); // waktu tunggu atau delay
    <?php endif ?>
</script>