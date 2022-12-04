<?= $this->extend('template/admin') ?>

<?php
    if (isset($_GET['page_page'])) {
        $page = $_GET['page_page'];
        $jumlah = 5;
        $no = ($jumlah * $page) - $jumlah + 1;
    } else {
        $no = 1;
    }
?>

<?= $this->section('content') ?>
<h1><?= $judul ?></h1>
<div class="row">
    <div class="col-12">
<form action="<?= base_url()?>/admin/orderdetail/cari" method="post">
    <div class="form-group col-6 float-start">
    <label class="form-label" for="">Awal :</label>  
    <input class="form-control" type="date" name="awal" id="" required><br>
    </div>
    <div class="form-group col-6 float-start">
    <label class="form-label" for="">Sampai :</label> 
    <input class="form-control" type="date" name="sampai" id="" required><br>
    </div>
    <br>
    <div class="ml-3">
    <input class="btn btn-primary" type="submit" value="cari" name="cari">
    </div>
</form>
</div>
</div>
<table class="table mt-4">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Menu</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
<?php foreach ($orderdetail as $od) :?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $od['tglorder'] ?></td>
        <td><?= $od['menu'] ?></td>
        <td><?= $od['harga'] ?></td>
        <td><?= $od['jumlah'] ?></td>
        <td><?= $od['jumlah'] * $od['harga'] ?></td>
    </tr>
<?php endforeach ?>
</table>
<?= $pager->links('page','bootstrap') ?>
<?= $this->endSection() ?>