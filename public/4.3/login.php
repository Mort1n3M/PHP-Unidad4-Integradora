<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['usuarioActivo'])) {
    header('Location: usuarios.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonFile = __DIR__ . '/datos/usuarios.json';
    $usuarios = [];
    
    if (file_exists($jsonFile)) {
        $usuarios = json_decode(file_get_contents($jsonFile), true) ?? [];
    }
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    
    // Find user
    $user = array_filter($usuarios, function($u) use ($username, $password) {
        return $u['nombre'] === $username && $u['password'] === $password;
    });
    
    if (!empty($user)) {
        $_SESSION['usuarioActivo'] = $username;
        $_SESSION['nombre'] = $username;
        
        // Set remember-me cookie if checked
        if ($remember) {
            setcookie('remember_user', $username, time() + (30 * 24 * 60 * 60), '/');
        }
        
        header('Location: usuarios.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">Login</h2>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>