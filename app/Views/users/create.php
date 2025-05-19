<h2>Crear nuevo usuario</h2>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('users/create'); ?>" method="post">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>">
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo set_value('email'); ?>">
    </div>
    
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    
    <button type="submit" class="btn btn-success">Crear usuario</button>
    <a href="<?php echo site_url('users'); ?>" class="btn btn-primary">Back to List</a>
</form>