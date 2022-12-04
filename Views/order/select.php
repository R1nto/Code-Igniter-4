<?= $this->extend('template/admin') ?>

<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $jumlah = 2;
        $no = ($jumlah * $page) - $jumlah + 1;
    } else {
        $no = 1;
    }
?>

<?= $this->section('content') ?>
<h1 class="float-start">Data Order</h1>
<table class="table mt-4">
    <tr>
        <th>No</th>
        <th>Id Order</th>
        <th>Pelanggan</th>
        <th>Tanggal</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembali</th>
        <th>Status</th>
    </tr>
<?php foreach ($order as $o) :?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $o['idorder'] ?></td>
        <td><?= $o['pelanggan'] ?></td>
        <td><?= $o['tglorder'] ?></td>
        <td><?= $o['total'] ?></td>
        <td><?= $o['bayar'] ?></td>
        <td><?= $o['kembali'] ?></td>
        <?php
            if ($o['status']==1) {
                $status = "Lunas";
            } else {
                $status = "<a href='".base_url("/admin/order/find")."/".$o['idorder']. "'>Bayar</a>";
            }
        ?>
        <td><?= $status?></td>
            <a href="<?= base_url("/admin/order/find")?>"></a>
    </tr>
<?php endforeach ?>
</table>

<?= $pager->makelinks(1 , $tampil, $total ,'bootstrap') ?>

<?= $this->endSection() ?>