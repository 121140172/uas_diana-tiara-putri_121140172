<?php
session_start();
require_once 'Model/CatatanModel.php';
$catatanModel = new CatatanModel();

global $data;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama' => $_POST['nama'],
        'isi' => $_POST['isi'],
        'priority' => $_POST['priority'],
        'tag' => $_POST['tags'],
        'browser' => $_SERVER['HTTP_USER_AGENT'],
        'ip' => $_SERVER['REMOTE_ADDR']
    ];
    if (empty($data['nama']) || empty($data['isi']) || empty($data['priority']) || empty($data['tag'])) {
        $_SESSION['error'] = 'Semua input harus diisi';
        $_SESSION['old'] = $data;
        header('Location: index.php');
        exit;
    }
    $data['tag'] = implode(', ', $_POST['tags']);
    if (!$catatanModel->create($data)) {
        $_SESSION['error'] = 'Gagal menambahkan catatan';
        $_SESSION['old'] = $data;
        header('Location: index.php');
        exit;
    }
    $_SESSION['success'] = 'Berhasil menambahkan catatan';
    unset($_SESSION['old']);
    header('Location: index.php');
    exit;
}
$data = $catatanModel->getAll();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Bersama</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['error'])): ?>
            <div style="color: red; font-weight: bold; margin-bottom: 10px;">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div style="color: green; font-weight: bold; margin-bottom: 10px;">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>


        <?php include 'form.php'; ?>
        <?php include 'table.php'; ?>
    </div>
</body>

</html>