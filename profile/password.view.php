<form action="" method="POST" novalidate>
    <div class="form-group">
        <label for="current_password">Contraseña Actual</label>
        <input type="password" class="form-control <?=($errors['current_password'])?"is-invalid":""?>" id="current_password" name="current_password" aria-describedby="passwordHelp" placeholder="Password">
        <small id="currentPasswordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo</small>
        <?=validationDiv('current_password','invalid-feedback')?>
    </div>
    <hr>
    <div class="form-group">
        <label for="password">Nueva Contraseña</label>
        <input type="password" class="form-control <?=($errors['password'])?"is-invalid":""?>" id="password" name="password" aria-describedby="passwordHelp" placeholder="Password">
        <small id="passwordHelp" class="form-text text-muted">Debe tener 6 caracteres como mínimo</small>
        <?=validationDiv('password','invalid-feedback')?>
    </div>
    <div class="form-group">
        <label for="password-conf">Confirmar Nueva Contraseña</label>
        <input type="password" class="form-control <?=($errors['passwordconf'])?"is-invalid":""?>" id="password-conf" name="password-conf" placeholder="Password">
        <?=validationDiv('passwordconf', 'invalid-feedback')?>
    </div>
    <button type="submit" name="update_password" class="btn btn-primary">Actualizar Contraseña</button>
</form>