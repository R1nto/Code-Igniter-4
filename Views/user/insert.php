<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>
<h1>Form Insert</h1>
<form action="<?= base_url()?>/admin/user/insert" method="post">
    <label class="form-label" for="">User :</label>  
    <input class="form-control w-50" type="text" name="user" id="" required>
    <br>
    <label class="form-label" for="">Email :</label> 
    <input class="form-control w-50" type="email" name="email" id="" required>
    <br>
    <label class="form-label" for="">Password :</label> 
    <input class="form-control w-50" type="password" name="password" id="" required>
    <br>
    <div class="form-group">    
    <label class="form-label" for="">Posisi :</label> 
    <select class="form-control w-50" name="level" id="level">
    <?php foreach ($level as $l) :?>
    <option value="<?= $l?>"><?= $l ?></option>
    <?php endforeach ?>
    </select>
    </div>
    <br>

    <?php
        if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');  
        foreach ($error as $key => $value){
            echo $value;
            echo '<br>';
        }
        echo '</div>';
        }
    ?>
    <input class="btn btn-primary" type="submit" value="Simpan" name="Simpan">
</form>

<?= $this->endSection() ?>