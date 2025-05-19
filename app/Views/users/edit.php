<h2>Editar Usuario</h2>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('users/edit/'.$user->id); ?>" method="post">
    <div class="form-group">
        <label>Nombre Usuarioe</label>
        <input type="text" name="username" value="<?php echo set_value('username', $user->username); ?>">
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo set_value('email', $user->email); ?>">
    </div>
    
    <div class="form-group">
        <label>Contraseña (dejar en blanco para mantenerse actualizada)</label>
        <input type="password" name="password">
    </div>
    
    <button type="submit" class="btn btn-success">Actualizar usuario</button>
    <a href="<?php echo site_url('users'); ?>" class="btn btn-primary">Volver a la lista</a>
</form>