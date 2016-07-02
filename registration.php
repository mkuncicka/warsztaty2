<?php
require_once 'src/functions.php';
require_once 'src/User.php';

$conn = connectToDataBase();
if ($_SERVER['REQUEST_METHOD']==='POST') {
    if (isset($_POST['email']) and isset($_POST['password'])) {
        $id = -1;
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $description = $conn->real_escape_string($_POST['description']);
        $isActive = true;
        $user = new User($email, $password, $description, $isActive);
        $user->save($conn);
        redirect('login.php');
    }
}
?>

<html>
<head>
    <title>Formularz rejestracji</title>
</head>
<body>
<form method="post">
    <p>
        <label for="mail">Podaj email</label>
        <input type="email" name="email" placeholder="Wpisz e-mail">
    </p>
    <p>
        <label for="password">Podaj hasło</label>
        <input type="password" name="password" placeholder="Wpisz hasło">
    </p>
    <p>
        <label for="description">Podaj informacje o sobie</label>
        <input type="text" name="description" placeholder="Dodaj opis swojej osoby">
    </p>
    <p>
        <button type="submit" name="register">Zarejestruj</button>
    </p>
</form>
</body>
</html>
