<div class="container-fluid">

    <?php
        $i = 1;
        $success = session()->getFlashdata('success');
        if(!empty($success)){ 
    ?>
        <div class="alert alert-success mx-3" role="alert">
            Surat berhasil diverifikasi.
        </div>
    <?php } ?>
    
    <div class="card mx-3">
        <div class="card-header">
            <button class="btn btn-success" id="exportbutton">Export</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Warga</th>
                        <th>Jenis Surat</th>
                        <th>RT</th>
                        <th>Tanggal Mengajukan</th>
                        <th class="excludeData">Verifikasi</th>
                        <!-- <th class="excludeData">Opsi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($surat as $data): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data['nama_warga'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td><?= $data['id_rt'] ?></td>
                        <td><?= date("Y/m/d", ( strtotime( $data['tanggal_diajukan'] ) ) ) ?></td>
                        <td>
                        <?php if ($data['status_persetujuan'] === '0') { ?>
                            <a href="#" class="btn btn-sm btn-primary disabled" >Menunggu Verifikasi RT</a>
                        <?php } ?>
                        <?php if ($data['status_persetujuan'] === '1') { ?>
                            <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                            <a href="verifikasi-surat/<?= $data['id_warga'] ?>" class="btn btn-sm btn-success">Verifikasi</a>
                        <?php } ?>
                        <?php if ($data['status_persetujuan'] === '2') { ?>
                            <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                            <a href="#" class="btn btn-sm btn-success disabled" >Sudah Diverifikasi</a>
                        <?php } ?>
                        </td>
                        <!-- <td class="excludeData"><i class="fas fa-download"></i></td> -->
                    </tr>
                    <?php endforeach ?>
                    <!-- <tr>
                        <td>Asep Kasep</td>
                        <td>Pembuatan KK</td>
                        <td>01</td>
                        <td>2/2/2021</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                            <a href="#" class="btn btn-sm btn-success">Verifikasi</a>
                        </td>
                        <td class="excludeData"><i class="fas fa-download"></i></td>
                    </tr>
                    <tr>
                        <td>Budi Bubudi</td>
                        <td>Pembuatan KTP</td>
                        <td>05</td>
                        <td>1/2/2021</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                            <a href="#" class="btn btn-sm btn-success">Verifikasi</a>
                        </td>
                        <td class="excludeData"><i class="fas fa-download"></i></td>
                    </tr>
                    <tr>
                        <td>Herwi Potah</td>
                        <td>Surat Keterangan Pindah</td>
                        <td>07</td>
                        <td>3/2/2021</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                            <a href="#" class="btn btn-sm btn-success">Verifikasi</a>
                        </td>
                        <td class="excludeData"><i class="fas fa-download"></i></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>

<br>