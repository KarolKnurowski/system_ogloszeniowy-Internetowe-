<?php
@include 'config.php';

session_start();
//var_dump($_SESSION['registration_data']);

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_SESSION['registration_data']['usermail']);
    $kodWeryfikacyjny = mysqli_real_escape_string($conn, $_SESSION['registration_data']['verification_code']);



    if (!isset($error)) {
        $select = "SELECT * FROM konto WHERE email = '$email' ";
        $result = mysqli_query($conn, $select);
        
        if ($result) {
            $userData = mysqli_fetch_assoc($result);

            if ($userData) {
                $admin = "NIE";
                $firma = isset($_SESSION['registration_data']['checkboxfirma']) && $_SESSION['registration_data']['checkboxfirma'] == 1 ? 'TAK' : 'NIE';
                $hashedPassword = $userData['haslo']; 

                $insert = "INSERT INTO konto(email, haslo, admin, firma) VALUES('$email','$hashedPassword','$admin','$firma')";
                $result_insert = mysqli_query($conn, $insert);

                if ($result_insert) {
                    $_SESSION['id'] =  $userData['id'];
                    $_SESSION['czyfirma'] = $firma; 
                    $_SESSION['czyadmin'] = $admin;

                    header('location:/system_ogloszeniowy-Internetowe-/glowna.php');
                    exit;
                } else {
                    $error[] = 'Błąd podczas dodawania danych do bazy: ' . mysqli_error($conn);
                }
            } else {
                $error[] = 'Nieprawidłowy kod weryfikacyjny!';
            }
        } else {
            $error[] = 'Błąd w zapytaniu SQL: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-logowanie.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3 class="title">Logowanie</h3>

            <?php
            if (isset($error)) {
                foreach ($error as $errorMessage) {
                    echo '<span class="error-msg">' . $errorMessage . '</span>';
                }
            }
            ?>

            <div class="textt">Podaj kod weryfikacyjny:</div>
            <input type="text" name="verification_code" placeholder="Wpisz kod weryfikacyjny wysłany na podany e-mail" class="box" required><br>
            <input type="submit" value="Potwierdź!" name="submit" class="form-btn">
        </form>
    </div>
</body>

</html>
