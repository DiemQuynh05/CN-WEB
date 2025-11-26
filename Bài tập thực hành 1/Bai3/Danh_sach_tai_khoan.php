<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách tài khoản</title>
<style>
    body {
        font-family: Arial;
        background: #edf1f5;
        padding: 20px;
    }
    h2 {
        text-align: center;
        color: #0044aa;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }
    th {
        background: #0078ff;
        color: #fff;
        padding: 12px;
        text-transform: uppercase;
    }
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }
    tr:hover {
        background: #eaf2ff;
    }
</style>
</head>
<body>

<h2>Danh sách sinh viên</h2>

<table>
    <thead>
        <tr>
        <?php
        if (($file = fopen("65HTTT_Danh_sach_diem_danh.csv", "r")) !== false) {
            $header = fgetcsv($file);
            foreach ($header as $col) {
                echo "<th>$col</th>";
            }
            echo "</tr></thead><tbody>";

            while (($row = fgetcsv($file)) !== false) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>$data</td>";
                }
                echo "</tr>";
            }
            fclose($file);
        } else {
            echo "</tr></thead><tbody>";
            echo "<tr><td colspan='7'>Không thể mở file CSV</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
