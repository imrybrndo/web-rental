<?php
$url = 'data_motor';

if (isset($_GET['sewa'])) {
    $id = '';
    $durasi_sewa = '';
?>
    <?= content_open() ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <?= input_hidden('id', $id) ?>
        <div class="form-group">
            <label for="" class="form-label">Waktu Pengambilan</label>
            <?= input_number('durasi_sewa', $durasi_sewa) ?>
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">Waktu Pengembalian</label>
            <?= input_number('durasi_sewa', $durasi_sewa) ?>
        </div>
        <div class="form-group mt-3">
            <label for="" class="form-label">Durasi Sewa</label>
            <?= input_number('durasi_sewa', $durasi_sewa) ?>
        </div>
        <div class="form-group mt-3">
            <label for="price" class="form-label">Harga Sewa</label>
            <input type="number" name="harga" class="form-control" id="price" name="price" step="1" min="0" placeholder="Rp" disabled />
        </div>
        <div class="form-group mt-3">
            <button name="simpan" class="btn btn-success"><i class="fa fa-plus"></i> Kirim</button>
            <a href="<?= url('data_motor') ?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
        </div>
    </form>
    <?= content_close() ?>
<?php
} else { ?>
    <section class="d-flex flex-column gap-4">
        <div class="d-flex gap-4 flex-wrap">

            <?php
            $getdata = $db->ObjectBuilder()->get('daftar_motor');
            foreach ($getdata as $row) { ?>

                <div class="product-card shadow rounded">
                    <img src="<?= assets('unggah/jpg/' . $row->gambar) ?>" alt="<?= $row->nama_motor ?>" width="260" height="180" />
                    <div class="product-detail pt-3">
                        <div>
                            <p class="title-detail mb-1"><?= $row->nama_motor ?></p>
                            <p class="label-detail"><?= $row->jenis_motor ?></p>
                        </div>
                    </div>

                    <div class="product-detail pt-4">
                        <div>
                            <p class="label-detail mb-1">Harga Sewa/Hari</p>
                            <p class="price-detail">Rp. <?= $row->harga ?></p>
                        </div>
                        <a href="<?= url($url . '&sewa') ?>" class="button btn-rounded">
                            Sewa
                        </a>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </section>
<?php
} ?>
