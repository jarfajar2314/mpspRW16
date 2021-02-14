<div class="container-fluid">
    <!-- <pre>
    <php var_dump($surat);?>
    </pre> -->
    <!-- Small boxes (Stat box) -->
    <div class="row px-3">
        <!-- Pengajuan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <!-- Text -->
                <div class="inner">
                    <h3><?= $count_surat ?></h3>
                    <p>Pengajuan</p>
                </div>
                <!-- Icon -->
                <div class="icon">
                    <i class="fas fa-list-ul"></i>
                </div>

            </div>
        </div>
        <!-- / pengajuan -->
        
        <!-- Terverifikasi -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $count_terverifikasi ?></h3>
                    <p>Terverifikasi</p>
                </div>

                <div class="icon">
                    <i class="fas fa-check"></i>
                </div>
              
            </div>
        </div>
        <!-- / terverifikasi -->

        <!-- Laporan Pemalsuan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <a href="/lapor-pemalsuan" class="text-white">
                        <h3><?= $count_pemalsuan ?></h3>
                        <p>Laporan Pemalsuan</p>
                    </a>
                </div>

                <div class="icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

            </div>
        </div>
        <!-- / laporan pemalsuan -->

        <!-- Akun Belum Terverifikasi -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <a href="/verifikasi-akun" class="text-white">
                        <h3><?= $count_akun_unverified ?></h3>
                        <p>Akun Belum Terverifikasi</p>
                    </a>
                </div>

                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>

            </div>
        </div>
        <!-- / Akun belum terverifikasi -->

    </div>
    <!-- /. row -->
</div>
<!-- /. container fluid -->

<div class="container-fluid">

    <div class="card mx-3">
        <div class="card-header">
            <a href="#" class="btn btn-primary">Tambah RT</a>
            <!-- <button class="btn btn-success" id="exportbutton">Export</button> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Warga</th>
                        <th>Jenis Surat</th>
                        <th>RT</th>
                        <th>Tanggal Mengajukan</th>
                        <th>Verifikasi</th>
                        <!-- <th class="excludeData">Opsi</th> -->
                    </tr>
                </thead>
                <tbody>
                
                    <?php foreach($surat as $data): ?>
                    <?php if($data['status_persetujuan'] != 3): ?>
                    <tr>
                        <td><?= $data['nama_warga'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td><?= $data['id_rt'] ?></td>
                        <td><?= date("Y/m/d", ( strtotime( $data['tanggal_diajukan'] ) ) ) ?></td>
                        <!-- <td><= $data['tanggal_diajukan'] ?></td> -->
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Lihat</a>
                            <a href="#" class="btn btn-sm btn-success">Verifikasi</a>
                        </td>
                        <!-- <td class="excludeData"><i class="fas fa-download"></i></td> -->
                    </tr>
                    <?php endif ?>
                    <?php endforeach ?>
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>

<br>