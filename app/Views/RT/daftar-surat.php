<!-- /. container fluid -->

<div class="container-fluid">

    <div class="card mx-3">
        <div class="card-header">
            <button class="btn btn-success" id="exportbutton">Export</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Warga</th>
                        <th scope="col">Jenis Surat</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Verifikasi</th>
                        <th class="excludeData">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($surat as $row) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['nama_warga']; ?></td>
                            <td><?= $row['keterangan']; ?></td>
                            <td><?= $row['tanggal_diajukan']; ?></td>
                            <td>
                                <form method="POST" action="<?php echo base_url('/rt/verifSurat'); ?>">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id_surat" value="<?php echo $row['id_surat']; ?>" />
                                        <input type="hidden" name="id_warga" value="<?php echo $row['id_warga']; ?>" />
                                        <input type="hidden" name="id_jenis" value="<?php echo $row['id_jenis']; ?>" />
                                        <input type="hidden" name="nama_surat" value="<?php echo $row['nama_surat']; ?>" />
                                        <input type="hidden" name="tanggal_diajukan" value="<?php echo $row['tanggal_diajukan']; ?>" />
                                        <a type="button" class="btn btn-primary" href="<?php echo base_url('/rt/lihatDataSurat/' . $row['id_surat']) ?>">Lihat</a>
                                        <?php if ($row['status_persetujuan'] != 1) : ?>
                                            <button type="submit" class="btn btn-success">Verifikasi</button>
                                        <?php endif ?>
                                        <?php if ($row['status_persetujuan'] == 1) : ?>
                                            <button type="submit" class="btn btn-success disabled">Sudah Diverifikasi</button>
                                        <?php endif ?>
                                    </div>
                                </form>
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