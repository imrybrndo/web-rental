<?php 
include 'loader.php';
$setTemplate = TRUE;

if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];
} else {
    $halaman = 'beranda';
}

ob_start();
$file = 'halaman/'.$halaman.'.php';
if (!file_exists($file)) {
    include 'halaman/error.php';
} else {
    include $file;
}

$content = ob_get_contents();
ob_clean();

if($setTemplate == TRUE){
  if ($session->get('logged')!==TRUE) {
    redirect(url('login'));
  }
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'layouts/head.php' ?>
<body>
    <?php include 'layouts/sidebar.php' ?>
    <main class="content flex-fill">

    <section>
        <button
          aria-controls="sidebar"
          data-bs-toggle="offcanvas"
          data-bs-target=".sidebar"
          aria-label="Button Hamburger"
          class="sidebarOffcanvas mb-5 btn p-0 border-0 d-flex d-lg-none"
        >
          <i class="fa-solid fa-bars"></i>
        </button>
        <nav class="nav-content gap-5">
          <div class="d-flex gap-3 align-items-center">
            <?php 
            $id = $session->get('id');
            $db->where('id_pengguna', $id);
            $getdata = $db->ObjectBuilder()->get('data_pengguna');
            foreach ($getdata as $row ) {?>
              <img
              src="<?=assets('unggah/profil/'.$row->foto_anda)?>"
              alt="Photo Profile"
              class="photo-profile"
            />
            <?php
            }
            ?>
            <div>
              <p class="title-content mb-2"><?=$session->pull('text')?> <?=$session->get('nama_pengguna')?></p>
            </div>
          </div>
        </nav>
    </section>
    <?php echo $content ?>
    </main>
    <?php include 'layouts/js.php' ?>
</body>
</html>
<?php } else {
    echo $content;
}?>