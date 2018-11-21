<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
    require_once '../functions/validation.php';
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <?php if( $result ): ?>
        <ul class="list-group">
        <?php while($item = sult) ): ?>
            <li class="list-group-item list-group-item-info"><?=$item['description']?></li>
        <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <hr>
        <form action="" method="POST" novalidate>
            <div class="form-group">
                <input type="text" class="form-control <?=($errors['item'])?"is-invalid":""?>" id="item" name="item" aria-describedby="itemHelp" placeholder="Introduce un nuevo item" value="<?=($username??'')?>">
                <small id="itemHelp" class="form-text text-muted">Debe introducir algo</small>
                <?=validationDiv('username', 'invalid-feedback')?>
            </div>
            <?=validationDiv('login','alert')?>
            <button type="submit" name="saveitem" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>