<div class="container-fluid">
    <div class="row px-3">
        <?php foreach ($surat as $row) : ?>
            <div class="card mx-4 col-lg-5">
                <div class="card-header">
                    <h4><b><?= $row['keterangan']; ?></b></h4>
                </div>
                <table class="table">
                    <?php $i = 1; ?>
                    <?php foreach ($syarat as $row2) : ?>
                        <?php if ($row['id_jenis2'] == $row2['id_jenis2']) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row2['syarat']; ?></td>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </table>
            </div>
        <?php endforeach ?>
    </div>
</div>