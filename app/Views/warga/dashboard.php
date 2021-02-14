<div class="container-fluid">
    <?php if ($warga['status_akun'] == 'Sudah Diverifikasi') : ?>

        <!-- Small boxes (Stat box) -->
        <div class="row px-3">
            <!-- Pengajuan -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <!-- Text -->
                    <div class="inner">
                        <h3><?= $jumlahPengajuan; ?></h3>
                        <p>Pengajuan</p>
                    </div>
                    <!-- Icon -->
                    <div class="icon">
                        <i class="fas fa-list-ul"></i>
                    </div>

                </div>
            </div>
            <!-- ./pengajuan -->

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jumlahTerverifikasiRT; ?></h3>
                        <p>Proses</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-cog"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlahTerverifikasiRW; ?></h3>
                        <p>Selesai</p>
                    </div>

                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>

                </div>
            </div>

        </div>

        <div class="container-fluid">

            <div class="card mx-3">
                <div class="card-header">
                    <a type="button" class="btn btn-primary" href="<?php echo base_url('/warga/addSurat') ?>">Tambah Surat</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Jenis Surat</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Status</th>
                                <th class="excludeData">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($surat as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td><?= $row['tanggal_diajukan']; ?></td>
                                    <td>
                                        <?php if ($row['status_persetujuan'] == 0) : ?>
                                            <div class="status-pengajuan">Pengajuan</div>
                                        <?php endif ?>
                                        <?php if ($row['status_persetujuan'] == 1) : ?>
                                            <div class="status-proses">Proses</div>
                                        <?php endif ?>
                                        <?php if ($row['status_persetujuan'] == 2) : ?>
                                            <div class="status-selesai">Selesai</div>
                                        <?php endif ?>
                                    </td>
                                    <td class="excludeData"><i class="fas fa-download"></i></td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    <?php endif ?>
    <?php if ($warga['status_akun'] == 'Belum Diverifikasi') : ?>
        <div class="container-fluid mt-1" style="text-align: center;">
            <h3>Akun Anda belum terverifikasi.</h3>
        </div>
    <?php endif ?>

</div>