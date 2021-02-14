<div class="container-fluid">
    <div class="card mx-3">
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <?php foreach ($surat as $row) : ?>
                        <tr>
                            <td>Nama Warga</td>
                            <td><?= $row['nama_warga']; ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td><?= $row['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>No. KK</td>
                            <td><?= $row['no_kk']; ?></td>
                        </tr>
                        <tr>
                            <td>Pas Foto</td>
                            <td><img src="/img/<?= $row['pas_foto']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Foto KTP</td>
                            <td><img src="/img/<?= $row['foto_KTP']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Foto KK</td>
                            <td><img src="/img/<?= $row['foto_KK']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Jenis Warga</td>
                            <td><?= $row['jenis_warga']; ?></td>
                        </tr>
                        <?php if ($row['jenis_warga'] == '2') : ?>
                            <!-- musiman -->
                            <tr>
                                <td>SK Pindah</td>
                                <td><img src="/img/<?= $row['sk_pindah']; ?>"></td>
                            </tr>
                        <?php endif ?>
                        <tr>
                            <td>Jenis Surat</td>
                            <td><?= $row['keterangan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Mengajukan</td>
                            <td><?= $row['tanggal_diajukan']; ?></td>
                        </tr>
                        <?php if ($row['tanggal_ttd_rt'] != NULL) : ?>
                            <td>Tanggal RT Menandatangani</td>
                            <td><?= $row['tanggal_ttd_rt']; ?></td>
                        <?php endif ?>
                        <?php if ($row['tanggal_selesai'] != NULL) : ?>
                            <td>Tanggal RW Menandatangani</td>
                            <td><?= $row['tanggal_selesai']; ?></td>
                        <?php endif ?>
                        <tr>
                            <td>Status Persetujuan</td>
                            <?php if ($row['status_persetujuan'] == 0) : ?>
                                <td>Belum Diverifikasi RT dan RW</td>
                            <?php endif ?>
                            <?php if ($row['status_persetujuan'] == 1) : ?>
                                <td>Sudah Diverifikasi RT</td>
                            <?php endif ?>
                            <?php if ($row['status_persetujuan'] == 2) : ?>
                                <td>Sudah Diverifikasi RT dan RW</td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <a type="button" class="btn btn-primary" href="<?php echo base_url('/rt/index') ?>">Kembali</a>
        </div>
    </div>
</div>