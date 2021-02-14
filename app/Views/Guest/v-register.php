<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo($title)?> • SPS</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/resources/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/resources/dist/css/adminlte.min.css">
    
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    body{
        background-color: #e76f51 !important;
    }
</style>
<body class="hold-transition d-flex align-item-center justify-content-center">
<div class="register-box">
    <div class="register-logo">
        <a href="/" class="text-white">
            Manajemen Pengajuan Surat Pengantar
            <br>
            <b>RW 16 Sariwangi</b>
        </a>
    </div>

    <div class="card">
        <div class="card-body register-card-body rounded bg-light">

            <!-- Message -->
            <p class="login-box-msg">Daftarkan akun dengan mengisi form berikut</p>
    
            <!-- Form -->
            <?php echo form_open_multipart('GuestController/save');?>
        
                <!-- CSRF -->
                <?= csrf_field(); ?>

                <!-- Put flash data to variable -->
                <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    if(!empty($errors)){ 
                ?>
                    <!-- Error msg -->
                    <div class="alert alert-danger" role="alert">
                        Whoops! Ada kesalahan saat input data.
                    </div>
                <?php }if(!empty($success)){ ?>
                    <!-- Success msg -->
                    <div class="alert alert-success" role="alert">
                        Registrasi berhasil. Harap tunggu persetujuan RW untuk aktivasi akun.
                    </div>
                <?php } ?>

                <!-- Nama -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control <?php echo( isset($errors["nama_warga"]) ? 'is-invalid' : '') ?>" placeholder="Nama Lengkap" name="nama_warga" value="<?php echo $inputs['nama_warga']; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["nama_warga"]) ? $errors["nama_warga"] : '') ?>
                    </div>
                </div>

                <!-- NIK -->
                <div class="input-group mb-3">
                    <input type="number" class="form-control <?php echo( isset($errors["nik"]) ? 'is-invalid' : '') ?>" placeholder="Nomor Induk Kependudukan" name="nik" value="<?php echo $inputs['nik']; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["nik"]) ? $errors["nik"] : '') ?>
                    </div>
                </div>

                <!-- NO KK -->
                <div class="input-group mb-3">
                    <input type="number" class="form-control <?php echo( isset($errors["no_kk"]) ? 'is-invalid' : '') ?>" placeholder="Nomor Kartu Keluarga" name="no_kk" value="<?php echo $inputs['no_kk']; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["no_kk"]) ? $errors["no_kk"] : '') ?>
                    </div>
                </div>

                <!-- RT -->
                <div class="input-group mb-3">
                    <select class="form-select <?php echo( isset($errors["rt"]) ? 'is-invalid' : '') ?>" aria-label="Select RT" name="rt" style="width:100%">
                        <option selected>Pilih RT</option>
                        <!-- Loop to show list RT -->
                        <?php foreach ($listRT as $rt):?>
                        <option value="<?php echo $rt['id_rt']?>" <?php echo( $rt['id_rt'] === $inputs['rt'] ? "selected" : '' ); ?> >
                            <?php echo $rt['id_rt']?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["rt"]) ? $errors["rt"] : '') ?>
                    </div>
                </div>

                <!-- Foto KTP -->
                <div class="input-group mb-3 bg-white p-2 rounded">
                    <label class="form-label" for="fotoKTP">Foto Kartu Tanda Penduduk</label>
                    <input type="file" class="form-control-file <?php echo( isset($errors["fotoKTP"]) ? "is-invalid" : '') ?>" name="fotoKTP">
                    <div id="" class="form-text text-sm">Format yang diperbolehkan PDF/JPG/JPEG/PNG.</div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["fotoKTP"]) ? $errors["fotoKTP"] : '') ?>
                    </div>
                </div>

                <!-- Foto KK -->
                <div class="input-group mb-3 bg-white p-2 rounded">
                    <label class="form-label" for="fotoKK">Foto Kartu Keluarga</label>
                    <input type="file" class="form-control-file <?php echo( isset($errors["fotoKK"]) ? "is-invalid" : '') ?>" name="fotoKK">
                    <div id="" class="form-text text-sm">Format yang diperbolehkan PDF/JPG/JPEG/PNG.</div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["fotoKK"]) ? $errors["fotoKK"] : '') ?>
                    </div>
                </div>

                <!-- Surat Tanda Penduduk Musiman -->
                <div class="input-group mb-3 bg-white p-2 rounded">
                    <!-- Checkbox -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="musiman" name="musiman" <?php echo( isset($inputs["musiman"]) ? "checked" : '') ?> >
                        <label class="form-check-label" for="musiman">Warga Musiman</label>
                    </div>
                    <!-- Input file -->
                    <label class="form-label" for="skMusiman">Surat Tanda Penduduk Musiman</label>
                    <input type="file" class="form-control-file <?php echo( isset($errors["skMusiman"]) ? "is-invalid" : '') ?>" name="skMusiman" id="skMusiman">
                    <div id="" class="form-text text-sm">Format yang diperbolehkan PDF/JPG/JPEG/PNG.</div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["skMusiman"]) ? $errors["skMusiman"] : '') ?>
                    </div>
                </div>

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="email" class="form-control <?php echo( isset($errors["email"]) ? "is-invalid" : '') ?>" placeholder="Email" name="email" value="<?php echo $inputs['email']; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["email"]) ? $errors["email"] : '') ?>
                    </div>
                </div>

                <!-- Password -->
                <div class="input-group mb-3">
                    <input type="password" class="form-control <?php echo( isset($errors["password"]) ? "is-invalid" : '') ?>" placeholder="Password" name="password" value="<?php echo $inputs['password']; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div id="" class="form-text pl-2">Password minimal memiliki 6 karakter.</div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["password"]) ? $errors["password"] : '') ?>
                    </div>
                </div>

                <!-- Re-type Password -->
                <div class="input-group mb-3">
                    <input type="password" class="form-control <?php echo( isset($errors["re-password"]) ? "is-invalid" : '') ?>" placeholder="Tulis ulang password" name="re-password" value="<?php echo $inputs['re-password']; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <!-- error msg -->
                    <div class="invalid-feedback">
                        <?php echo( isset($errors["re-password"]) ? $errors["re-password"] : '') ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Mengisi data dengan benar checkbox -->
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkData" name="checkData">
                            <label for="checkData">Saya mengisi data ini dengan benar.</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Register button -->
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block" id="register">Daftar</button>
                    </div>
                </div>

            <!-- </form> -->
            <?php echo form_close(); ?>

            <!-- Return to login page -->
            <a href="/" class="text-center text-primary">Saya sudah terdaftar</a>

        </div><!-- /.form-box -->
    </div><!-- /.card -->
</div><!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/resources/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/resources/dist/js/adminlte.min.js"></script>

<script>
    // Warga Musiman & checkData Checkbox
    $(document).ready(function(){
        // Set #register to disabled
        $('#register').prop("disabled", true);
        // Check if #musiman checkbox
        if($('#musiman').prop("checked") == true){
            $('#skMusiman').prop("disabled", false);
        }
        else{
            $('#skMusiman').prop("disabled", true);
        }

        // if #musiman clicked
		$("#musiman").click(function(){
            if($(this).prop("checked") == true){
                $('#skMusiman').prop("disabled", false);
            }
            else if($(this).prop("checked") == false){
                $('#skMusiman').prop("disabled", true);
            }
        });

        // if #checkData clicked
        $("#checkData").click(function(){
            if($(this).prop("checked") == true){
                $('#register').prop("disabled", false);
            }
            else if($(this).prop("checked") == false){
                $('#register').prop("disabled", true);
            }
        });
        
    });
</script>

</body>
</html>