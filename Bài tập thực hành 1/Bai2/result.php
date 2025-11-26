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

$score = 0;

foreach ($questions as $index => $q) {
    $selected = $_POST["q$index"] ?? '';

    if ($selected === $q['answer']) {
        $score++;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Kết quả Quiz</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #fdf8ff;
    padding: 30px;
    display: flex;
    justify-content: center;
}

.container {
    background: white;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 400px;
    text-align: center;
}

h2 {
    color: #7b3fa0;
    margin-bottom: 20px;
}

.score {
    font-size: 24px;
    font-weight: bold;
    color: #27ae60;
    margin: 15px 0;
}

a.retry {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 18px;
    background-color: #9b59b6;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    transition: 0.2s;
}

a.retry:hover {
    background-color: #7d3c98;
    transform: translateY(-2px);
}
</style>
</head>
<body>
<div class="container">
    <h2>🌟 Kết quả Quiz của bạn 🌟</h2>
    <div class="score"><?= $score ?> / <?= count($questions) ?></div>
    <a href="quiz.php" class="retry">Làm lại</a>
</div>
</body>
</html>
