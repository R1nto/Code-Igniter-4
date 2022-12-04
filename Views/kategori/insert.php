<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<h1>Form Insert</h1>
<form action="<?= base_url()?>/admin/kategori/insert" method="post">
    <label class="form-label" for="">Kategori :</label>  
    <input class="form-control w-50" type="text" name="kategori" id="" required>
    <br>
    <label class="form-label" for="">Keterangan :</label> 
    <input class="form-control w-50" type="text" name="keterangan" id="" required>
    <br>
    <?php
        if (!empty(session()->getFlashdata('info'))) {
            echo '<div class="alert alert-danger" role="alert">';
            echo session()->getFlashdata('info');  
            echo '</div>';
        }
    ?>
    <input class="btn btn-primary" type="submit" value="simpan" name="simpan">
</form>

<?= $this->endSection() ?>