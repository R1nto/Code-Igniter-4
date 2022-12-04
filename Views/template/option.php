<div class="form-group">
<select class="form-control" name="idkategori" onchange="this.form.submit()" id="idkategori">
<option value="1">Cari...</option>
<?php foreach ($kategori as $k) :?>
    <option value="<?= $k['idkategori']?>"><?= $k['kategori'] ?></option>
<?php endforeach ?>
</select>
</div>