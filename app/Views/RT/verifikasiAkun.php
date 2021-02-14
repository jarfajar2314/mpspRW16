<div class="container-fluid">

    <?php
        $i = 1;
        $success = session()->getFlashdata('success');
        if(!empty($success)){ 
    ?>
        <div class="alert alert-success mx-3" role="alert">
            Akun berhasil diverifikasi.
        </div>
    <?php } ?>

    <div class="card mx-3">
        <!-- <div class="card-header"> -->
            <!-- <h5>Daftar akun yang menunggu untuk diverifikasi</h5> -->
        <!-- </div> -->
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tableVerAcc" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Warga</th>
                        <th>NIK</th>
                        <th>RT</th>
                        <th>Jenis</th>
                        <th>KTP</th>
                        <th>KK</th>
                        <th>SK Pindah</th>
                        <th class="excludeData">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($akun as $data): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['nama_warga'] ?></td>
                        <td><?= $data['nik'] ?></td>
                        <td><?= $data['id_rt'] ?></td>                        
                        <td><?= $data['jenis_warga'] ?></td>
                        <td class="excludeData">
                            <!-- <a href="/viewFile/<= "KTP/" . $data['foto_KTP'] ?>" class="btn btn-sm btn-primary" target="_blank">Lihat</a> -->
                            <a href="/files/<?= "KTP/" . $data['foto_KTP'] ?>" class="btn btn-sm btn-primary" target="_blank">Lihat</a>
                        </td>
                        <td class="excludeData">
                            <!-- <a href="/viewFile/<= "KK/" . $data['foto_KK'] ?>" class="btn btn-sm btn-primary" target="_blank">Lihat</a> -->
                            <a href="/files/<?= "KK/" . $data['foto_KK'] ?>" class="btn btn-sm btn-primary" target="_blank">Lihat</a>
                        </td>
                        <td class="excludeData">
                            <!-- <a href="/viewFile/<= "SKPindah/" . $data['sk_pindah'] ?>" class="btn btn-sm btn-primary" target="_blank">Lihat</a> -->
                            <a href="/files/<?= "SKPindah/" . $data['sk_pindah'] ?>" class="btn btn-sm btn-primary <?= $data['jenis_warga']=='Tetap' ? "disabled" : '' ?>" target="_blank" >Lihat</a>
                        </td>
                        <td class="excludeData">
                            <?php if ($data['status_akun'] === 'Sudah Diverifikasi') { ?>
                                <a href="" class="btn btn-sm btn-success disabled" >Sudah Diverifikasi</a>
                            <?php }else{ ?>
                                <a href="verifikasi/<?= $data['nik'] ?>" class="btn btn-sm btn-success">Verifikasi</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>

<br>