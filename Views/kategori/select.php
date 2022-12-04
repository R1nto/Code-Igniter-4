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
<h1 class="float-start"><?= $judul ?></h1>
<a class="btn btn-primary mt-2 float-end" href="<?= base_url()?>/admin/kategori/create">Tambah Data</a>
<table class="table mt-4">
    <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Keterangan</th>
        <th>Ubah</th>
        <th>Hapus</th>
    </tr>
<?php foreach ($kategori as $k) :?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $k['kategori'] ?></td>
        <td><?= $k['keterangan'] ?></td>
        <td><a href="<?= base_url()?>/admin/kategori/find/<?= $k['idkategori']?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt=""></a></td>
        <td><a href="<?= base_url()?>/admin/kategori/delete/<?= $k['idkategori']?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a></td>    
    </tr>
<?php endforeach ?>
</table>
<?= $pager->links('page','bootstrap') ?>
<?= $this->endSection() ?>