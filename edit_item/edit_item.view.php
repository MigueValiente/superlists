<?php
    require_once '../setup.php';
    require_once '../includes/header.php'; 
    require_once '../functions/validation.php';
?>
<div class="container">
    <div class="offset-3 col-6 pt-4 pb-4">
        <?php if( $item ): ?>
        <h2><a href="<?=BASE_URL.'list/?id='.$list_id?>"><?=$item['list_name']?></a></h2>
        <?php endif; ?>
        <hr>
        <form action="" method="POST" novalidate>
            <div class="form-group">
                <input type="text" class="form-control <?=($errors['item'])?"is-invalid":""?>" id="item" name="item" aria-describedby="itemHelp" placeholder="Introduce un nuevo item" value="<?=($item['item_text']??'')?>">
                <small id="itemHelp" class="form-text text-muted">Debe introducir algo</small>
                <?=validationDiv('item', 'invalid-feedback')?>
            </div>
            <?=validationDiv('login','alert')?>
            <button type="submit" name="edit_item" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>