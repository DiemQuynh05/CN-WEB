<?php 
require 'flowers.php'; 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý Loài Hoa - Admin</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #fdf8ff;
    margin: 0;
    padding: 20px;
}

h2 {
    text-align: center;
    color: #7b3fa0;
    margin-bottom: 20px;
}

a button {
    background-color: #9b59b6;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.2s;
}

a button:hover {
    background-color: #7d3c98;
    transform: translateY(-2px);
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    margin-top: 10px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.08);
}

th {
    background: #f4e1ff;
    padding: 12px;
    color: #5a2a7d;
    font-weight: bold;
    border-bottom: 2px solid #e0c8ff;
}

td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

tr:hover {
    background: #faf0ff;
}

img {
    width: 80px;
    height: auto;
    border-radius: 6px;
    border: 1px solid #ddd;
}

.action-btn button {
    margin: 2px;
    padding: 6px 10px;
    border-radius: 4px;
    cursor: pointer;
    border: none;
    color: white;
    transition: 0.2s;
}

.action-btn a:nth-child(1) button {
    background: #f39c12;
}

.action-btn a:nth-child(1) button:hover {
    background: #d68910;
}

.action-btn a:nth-child(2) button {
    background: #e74c3c;
}

.action-btn a:nth-child(2) button:hover {
    background: #c0392b;
}

.back {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    color: #7b3fa0;
    font-weight: bold;
}

.back:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<h2>🌼 Quản Trị Danh Sách Hoa</h2>

<a href="add.php"><button>➕ Thêm Hoa</button></a>

<table>
    <tr>
        <th>ID</th>
        <th>Ảnh</th>
        <th>Tên Hoa</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($flowers as $f) : ?>
    <tr>
        <td><?= $f['id']; ?></td>
        <td><img src="<?= $f['image']; ?>" alt="<?= $f['name']; ?>"></td>
        <td><?= $f['name']; ?></td>
        <td><?= $f['description']; ?></td>
        <td class="action-btn">
            <a href="edit.php?id=<?= $f['id']; ?>"><button>✏ Sửa</button></a>
            <a href="delete.php?id=<?= $f['id']; ?>"><button>🗑 Xóa</button></a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="user.php" class="back">← Trở lại trang người dùng</a>
</body>
</html>
