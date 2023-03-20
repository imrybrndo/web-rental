<?php
$setTemplate = FALSE;
$session->destroy('web-rental', true);
$session->set("info", '
    <div class="alert alert-success alert-dismissible">
    <h4><i class="icon fa fa-check"></i> Berhasil !!</h4> Anda berhasil keluar !!  Masukan nama pengguna dan kata sandi anda jika ingin masuk!!
    </div>');

redirect(url('login'));

?>