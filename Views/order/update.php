<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<div class="row">
    <h1>Pembayaran</h1>
</div>

<div class="row">
    <div class="col">
        <p>Pelanggan: <?= $order[0]['pelanggan']?> </p>
    </div>
    <div class="col">
        <p>Tanggal: <?= date("d-m-y", strtotime($order[0]['tglorder']))?> </p>
    </div>
    <div class="col">
        <p>Total: <b> <?= number_format($order[0]['total']) ?> </b> </p>
    </div>
</div>

<div class="row">
    <h1>Form Pembayaran</h1>
<form action="<?= base_url()?>/admin/order/update" method="post">
    <label class="form-label" for="">Bayar :</label>  
    <input class="form-control w-50" type="number" name="bayar"  id="" required>
    <br>
    <input class="form-control w-50" type="hidden" name="total" value="<?= $order[0]['total']?>"  id="" required>
    <input class="form-control w-50" type="hidden" name="idorder" value="<?= $order[0]['idorder']?>" id="" required>
    <?php
        if (!empty(session()->getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('info');  
            echo '</div>';
        }
    ?>
    <input class="btn btn-primary" type="submit" value="simpan" name="simpan">
</form>
</div>


<div class="row">
    <h1>Rincian Pembelian</h1>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php $no=1 ?>
            <?php foreach ($detail as $d):?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['menu'] ?></td>
                <td><?= $d['hargajual'] ?></td>
                <td><?= $d['jumlah'] ?></td>
                <td><?= $d['jumlah'] * $d['hargajual']?></td>
            </tr>
            <?php endforeach?>
        </table>
    </div>
</div>


<?= $this->endSection() ?>