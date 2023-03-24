<?php
$setTemplate = FALSE;

$nama_pengguna = '';
$username = '';
$password = '';

if (isset($_POST['simpan'])) {
  $data = array(
    'nama_pengguna' => $_POST['nama_pengguna'],
    'username' => $_POST['username'],
    'password' => md5($_POST['password'])
  );
  $exec = $db->insert('pengguna', $data);
  if ($exec) {
    $session->set('info', '
      <div class="alert alert-success" role="alert">
        Akun anda berhasil dibuat.!
      </div>
      ');
  } else {
    $session->set('info', '
      <div class="alert alert-success" role="alert">
        Gagal mendaftar, silahkan coba lagi.!
      </div>
      ');
  }
  redirect(url('register'));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Dashboard for ShoSo Marketplace" />
  <meta name="author" content="Rachma | @rachmadzii" />

  <title>Masuk</title>

  <link rel="stylesheet" href="<?= templates() ?>/css/styles.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/32f82e1dca.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="d-flex p-2 justify-content-center" style="margin-top: 150px;">
    <div class="card" style="border:none; margin-top: 50px;" data-aos="fade-right" data-aos-duration="500">
      <div class="card-body">
        <h1 class="text-center mb-3"><b>Daftar</b></h1>
        <form action="" method="POST">
          <?php $session->pull('info') ?>
          <div class="form-group">
            <label for="" class="form-label">Nama Pengguna</label>
            <?= input_text('nama_pengguna', $nama_pengguna) ?>
          </div>
          <div class="form-group mb-2">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username">
          </div>
          <div class="form-group">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="">
          </div>
          <p>Sudah punya akun? <a href="<?= url('login') ?>">Masuk !</a></p>
          <div class="d-flex justify-content-center mt-3">
            <button name="simpan" class="btn btn-success btn-lg btn-block">Daftar</button>
          </div>
        </form>
      </div>
    </div>
    <!-- <div data-aos="flip-right" data-aos-duration="2000">
        <img src="<?= templates() ?>assets/images/motor-vector.jpg" alt="" srcset="" style="height: 360px; max-width:100%;">
      </div> -->
  </div>

  <script src="<?= templates() ?>/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
