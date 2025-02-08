<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Validasi dasar
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo 'Format email tidak valid';
        exit;
    }

    // Mengirim email (contoh)
    $to = 'ceo@296.web.id'; // Ganti dengan alamat email Anda
    $subjectEmail = 'Pesan dari formulir kontak: ' . $subject;
    $body = "Nama: $name\nEmail: $email\nSubjek: $subject\nPesan: $message";
    $headers = "From: $email";

    if (mail($to, $subjectEmail, $body, $headers)) {
        http_response_code(200);
        echo 'Pesan berhasil dikirim';
    } else {
        http_response_code(500);
        echo 'Gagal mengirim pesan';
    }
} else {
    http_response_code(405);
    echo 'Metode Tidak Diizinkan';
}
?>
