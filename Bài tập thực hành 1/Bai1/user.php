<?php require 'flowers.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách Hoa</title>
<style>
    body {
        font-family: Arial, sans-serif;
        width: 70%;
        margin: auto;
        line-height: 1.6;
    }
    h2 {
        color: #333;
        margin-bottom: 20px;
    }
    .flower-item {
        margin-bottom: 50px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 30px;
    }
    .flower-item img {
        width: 100%;
        max-width: 500px;
        display: block;
        margin-top: 10px;
        border-radius: 8px;
    }
    .title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 8px;
    }
</style>
</head>
<body>

<h2>🌺 14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè
</h2>

<?php 
$stt = 1;
foreach ($flowers as $f) : ?>
<div class="flower-item">
    <div class="title"><?= $stt++ ?>. <?= $f['name']; ?></div>
    <p><?= $f['description']; ?></p>
    <img src="<?= $f['image']; ?>" alt="<?= $f['name']; ?>">
</div>
<?php endforeach; ?>

<a href="admin.php">→ Trang quản trị</a>

</body>
</html>