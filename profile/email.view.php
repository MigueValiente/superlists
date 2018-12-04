<form action="" method="POST" novalidate>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control <?=($errors['email'])?"is-invalid":""?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce un email"  value="<?=($user['email']??'')?>">
        <small id="emailHelp" class="form-text text-muted">No compartiremos tu email con nadie.</small>
        <?=validationDiv('email', 'invalid-feedback')?>
    </div>
    <button type="submit" name="update_email" class="btn btn-primary">Actualizar</button>
</form>