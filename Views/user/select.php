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
<a class="btn btn-primary mt-2 float-end" href="<?= base_url()?>/admin/user/create">Tambah Data</a>
<table class="table mt-4">
    <tr>
        <th>No</th>
        <th>Useer</th>
        <th>Email</th>
        <th>Posisi</th>
        <th>Status</th>
        <th>Ubah</th>
        <th>Hapus</th>
    </tr>
<?php foreach ($user as $u) :?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $u['user'] ?></td>
        <td><?= $u['email'] ?></td>
        <td><?= $u['level'] ?></td>
        <?php if ($u['aktif']==1) {
            $aktif = 'Aktif';
        }else {
            $aktif = 'Banned';
        }?>
        <td><a href="<?= base_url()?>/admin/user/update/<?= $u['iduser']?>/<?= $u['aktif']?>"><?= $aktif?></a></td>    
        <td><a href="<?= base_url()?>/admin/user/find/<?= $u['iduser']?>"><img src="<?= base_url('/icon/pencil.svg') ?>" alt=""></a></td>
        <td><a href="<?= base_url()?>/admin/user/delete/<?= $u['iduser']?>"><img src="<?= base_url('/icon/trash.svg') ?>" alt=""></a></td>    
    </tr>
<?php endforeach ?>
</table>
<?= $pager->links('page','bootstrap') ?>
<?= $this->endSection() ?>