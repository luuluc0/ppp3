<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["login"])) {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    if ($usuario == "root" && $clave == "1234") {
        $_SESSION["logueado"] = true;
        header("Location: menu.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Iniciar sesión</h2>

<form action="" method="POST">
    <input type="text" name="usuario" placeholder="Usuario" required><br><br>
    <input type="password" name="clave" placeholder="Contraseña" required><br><br>
    <button type="submit" name="login">Entrar</button>
</form>

<?php if (isset($error)) echo "<p>$error</p>"; ?>

</body>
</html>
