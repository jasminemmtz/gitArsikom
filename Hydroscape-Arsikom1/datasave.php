<?php
    session_start();

    if(empty($_SESSION['email'])) {
        header('Location: login.html');
    }

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = md5($_POST['password']);

    if (empty($id)) {
        //insert
        $url = 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-aeujc/endpoint/insertUser?username='.urlencode($username).'&email='.urlencode($email).'&telepon='.urlencode($telepon).'&password='.urlencode($password);
        $customrequest = 'POST';
    }

    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        // CURLOPT_POSTFIELDS => $data
    );
    
    curl_setopt_array($cUrl, $options);
    
    $response = curl_exec($cUrl);
                    
    curl_close($cUrl);
    
    if ($response) {
      header("Location: login.html");
    } else {
      echo 'Failed';
    }
    
    ?>
    