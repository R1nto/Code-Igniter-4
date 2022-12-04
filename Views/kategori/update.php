<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<h1>Form Update</h1>
<form action="<?= base_url()?>/admin/kategori/update" method="post">
    <label class="form-label" for="">Kategori :</label>   
    <input class="form-control w-50" type="text" name="kategori" id="" value="<?= $kategori['kategori']?>" required>
    <br>
    <label class="form-label" for="">Keterangan :</label>   
    <input class="form-control w-50" type="text" name="keterangan" id="" value="<?= $kategori['keterangan']?>" required>
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']?>">
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