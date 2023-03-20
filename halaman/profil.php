<?php 

$id = '';
$nama_lengkap = '';
$alamat = '';
$nomor_telepon = '';
$foto_ktp = '';
$foto_anda = '';

if (isset($_POST['simpan'])) {
    $ktp = upload('foto_ktp', 'profil');
    $foto = upload('foto_anda', 'profil');
    if ($_POST['id'] == '') {
        $id_user = $session->get('id');
        $data = Array(
            'nama_lengkap' =>$_POST['nama_lengkap'],
            'alamat' => $_POST['alamat'],
            'nomor_telepon' => $_POST['nomor'],
            'foto_ktp' => $ktp,
            'foto_anda' => $foto,
            'id_pengguna' => $id_user
        );

        $exec = $db->insert('data_pengguna',  $data);
        if ($exec) {
            $session->set('info', '
                <div class="alert alert-success" role="alert">
                    Data berhasil disimpan!
                </div>
            ');
        }else{
            $session->set('info', '
            <div class="alert alert-danger" role="alert">
                Data gagal disimpan!
            </div>
        ');
        }
        redirect(url('profil'));
    }
}

?>
<?=content_open()?>
<div class="d-flex justify-content-center">
    <?php 
    $id = $session->get('id');
    $db->where('id_pengguna', $id);
    $getdata = $db->ObjectBuilder()->get('data_pengguna');
    foreach ($getdata as $row) {?>
            <img
              src="<?=assets('unggah/profil/'.$row->foto_anda)?>"
              alt="Photo Profile"
              class="photo-profile"
            />
</div>
<p class="title-content text-center mt-4"><?=$row->nama_lengkap?></p>
<?php }
    ?>
<?=content_close()?>
<?=content_open()?>
<form action="" method="POST" enctype="multipart/form-data">
    <?=input_hidden('id', $id)?>
    <div class="form-group">
        <label for="" class="form-label">Nama Lengkap</label>
        <?=input_text('nama_lengkap', $nama_lengkap)?>
    </div>
    <div class="form-group mt-3">
        <label for="">Alamat</label>
        <?=input_text('alamat', $alamat)?>
    </div>
    <div class="form-group mt-3">
        <label for="" class="form-label">Nomor Telepon</label>
        <?=input_number('nomor', $nomor_telepon)?>
    </div>
    <div class="form-group mt-3">
        <label for="">KTP</label>
        <?=input_file('foto_ktp', $foto_ktp)?>
    </div>
    <div class="form-group mt-3">
        <label for="">Foto Anda</label>
        <?=input_file('foto_anda', $foto_anda)?>
    </div>
    <div class="form-group mt-3">
        <button name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <a href="" class="btn btn-warning"> <i class="fa fa-edit"></i> Ubah</a>
    </div>

</form>
<?=content_close()?>


