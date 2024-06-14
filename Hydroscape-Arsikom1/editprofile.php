<?php
session_start();

if(empty($_SESSION['username'])){
    header('Location: login.html');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id'];
    $usernamebaru = htmlspecialchars($_POST['usernamebaru']);
    $email = htmlspecialchars($_POST['email']);
    $telepon = htmlspecialchars($_POST['telepon']);

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/updateUserById',
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id' => $id,
            'username' => $usernamebaru,
            'email' => $email,
            'telepon' => $telepon
        )),
        CURLOPT_RETURNTRANSFER => true // Menambahkan opsi ini untuk mendapatkan respons dari permintaan cURL
    );

    curl_setopt_array($cUrl, $options);

    $response = curl_exec($cUrl);

    if (!$response) {
        $_SESSION['gagal'] = 'Gagal edit akun. Error: ' . curl_error($cUrl);
    } else {
        $_SESSION['username'] = $usernamebaru;
        $_SESSION['email'] = $email;
        $_SESSION['telepon'] = $telepon;
        $_SESSION['berhasil'] = 'Berhasil edit akun';
        unset($_SESSION['gagal']);
    }

    curl_close($cUrl);

    header('Location: profile.php');
    exit();
}
?>
