<?php 
$url = 'daftar_motor';

if (isset($_POST['simpan'])) {
    if ($_POST['id'] == '') {
        $file = upload('gambar_motor', 'jpg');
        $data = Array(
            'nama_motor' => $_POST['nama_motor'],
            'jenis_motor' => $_POST['jenis_motor'],
            'harga' => $_POST['harga'],
            'gambar' => $file
        );

        $exec = $db->insert('daftar_motor', $data);

        if ($exec) {
            $session->set('info','                
            <div class="alert alert-success mb-3" role="alert">
                Data motor berhasil disimpan.!
            </div>
            ');
        } else {
            $session->set('info','                
            <div class="alert alert-danger mb-3" role="alert">
                Data motor disimpan.!
            </div>
            ');
        }
        redirect(url('daftar_motor'));
    }
}

if (isset($_GET['tambah']) OR (isset($_GET['ubah']))) { 
    $id = '';
    $nama_motor = '';
    $jenis_motor = '';
    $harga_motor = '';
    $gambar_motor = '';
    
    if (isset($_GET['ubah']) AND ($_GET['id'])) {
        
    }

?>
<?=content_open()?>
    <form action="" method="POST" enctype="multipart/form-data">
        <?=input_hidden('id', $id)?>
        <div class="form-group">
            <label for="" class="form-label">Nama Motor</label>
            <?=input_text('nama_motor', $nama_motor)?>
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">Jenis Motor</label>
            <?=input_text('jenis_motor', $jenis_motor)?>
        </div>
        <div class="form-group mt-3">
            <label for="price" class="form-label">Harga:</label>
            <input type="number" name="harga" class="form-control" id="price" name="price" step="1" min="0" placeholder="Rp"/>
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">Gambar Motor</label>
            <?=input_file('gambar_motor', $gambar_motor)?>
        </div>
        <div class="form-group mt-3">
            <button name="simpan" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
            <a href="<?=url('daftar_motor')?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
        </div>
    </form>
<?=content_close()?>
<?php } else { ?>
<?=content_open()?>
    <?=$session->pull('info')?>
    <a href="<?=url($url.'&tambah')?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
    <table class="table table-stripped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Motor</th>
                <th>Jenis Motor</th>
                <th>Harga Motor</th>
                <th>Gambar Motor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $getdata = $db->ObjectBuilder()->get('daftar_motor');
            foreach ($getdata as $row) {?>
    
            <tr>
                <td><?=$no?></td>
                <td><?=$row->nama_motor?></td>
                <td><?=$row->jenis_motor?></td>
                <td>Rp.<?=$row->harga?></td>
                <td><img src="<?=assets('unggah/jpg/'.$row->gambar)?>" alt="" srcset="" style="height: 70px; border:1px solid;"></td>
                <td>
                    <a href="" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                    <a href="" class="btn btn-warning"><i class="fa fa-pencil"></i> Ubah</a>
                </td>
            </tr>

            <?php
            $no++;
                }
            ?>
        </tbody>
    </table>
<?=content_close()?>
<?php } ?>