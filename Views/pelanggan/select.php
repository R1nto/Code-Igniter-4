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
<table class="table mt-4">
    <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>Email</th>
        <th>Hapus</th>
        <th>Status</th>
    </tr>
<?php foreach ($pelanggan as $p) :?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p['pelanggan'] ?></td>
        <td><?= $p['alamat'] ?></td>
        <td><?= $p['telp'] ?></td>
        <td><?= $p['email'] ?></td>
        <td><a href="<?= base_url()?>/admin/pelanggan/delete/<?= $p['idpelanggan']?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a></td> 
        <?php
            if ($p['aktif'] == 1) {
                $aktif = "Aktif";
            }else{
                $aktif = "Non Aktif";
            }
        ?>   
        <td><a href="<?= base_url()?>/admin/pelanggan/update/<?= $p['idpelanggan']?>/<?= $p['aktif']?>"><?= $aktif?></a></td>    
    </tr>
<?php endforeach ?>
</table>
<?= $pager->links('page','bootstrap') ?>
<?= $this->endSection() ?>