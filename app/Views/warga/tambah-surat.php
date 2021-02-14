<div class="container-fluid">
    <div class="card mx-3">
        <div class="wrapper">
            <!-- <div class="card"> -->
                <div class="card-body">
                    <form method="POST" action="<?php echo base_url('/warga/saveSurat'); ?>">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label>Jenis Surat</label>
                            <br>
                            <select class="form-control" name="id_jenis" id="id_jenis">
                                <?php foreach ($jenis as $row) { ?>
                                    <option value="<?php echo $row['id_jenis']; ?>"><?php echo $row['keterangan']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="18 id form-group">
                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="keterangan...">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_warga" value="<?php echo $warga['id_warga']; ?>" />
                            <input type="hidden" name="nik" value="<?php echo $warga['nik']; ?>" />
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>