<?php
$data = file('Quiz.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$questions = [];
$tmp = [];

foreach ($data as $line) {
    if (strpos($line, "ANSWER:") === 0) {
        $tmp['answer'] = trim(substr($line, 7));
        $questions[] = $tmp;
        $tmp = [];
    } elseif (preg_match('/^[A-D]\./', $line)) {
        $optionKey = substr($line, 0, 1);
        $tmp['options'][$optionKey] = trim(substr($line, 2));
    } else {
        $tmp['question'] = $line;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm</title>

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #eef3f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 850px;
            margin: auto;
            background: #fff;
            padding: 25px 35px;
            border-radius: 15px;
            box-shadow: 0 0 12px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #0056d6;
            margin-bottom: 25px;
        }

        .question {
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .option {
            background: #f7f9fc;
            padding: 10px 14px;
            margin: 4px 0;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.25s;
            display: block;
        }

        .option:hover {
            background: #dfeaff;
            transform: scale(1.02);
        }

        input[type="radio"] {
            transform: scale(1.3);
            margin-right: 10px;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: #0078ff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: #0056d6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bài thi trắc nghiệm Android</h2>

        <form action="result.php" method="POST">
            <?php foreach ($questions as $index => $q) : ?>
                <p class="question">
                    Câu <?= $index + 1 ?>: <?= $q['question'] ?>
                </p>

                <?php foreach ($q['options'] as $key => $val): ?>
                    <label class="option">
                        <input type="radio" name="q<?= $index ?>" value="<?= $key ?>" required>
                        <?= $key ?>. <?= $val ?>
                    </label>
                <?php endforeach; ?>

                <hr>
            <?php endforeach; ?>

            <button type="submit">Nộp bài ngay 💪</button>
        </form>
    </div>
</body>
</html>
