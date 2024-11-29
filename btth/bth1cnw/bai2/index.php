<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Trắc Nghiệm Android</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bài Trắc Nghiệm Android</h1>
    <form method="POST" action="result.php">
        <?php
        $filename = "questions.txt";
        if (file_exists($filename)) {
            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $current_question = [];
            $question_number = 0;

            foreach ($questions as $line) {
                if (strpos($line, "ANSWER:") === 0) {
                    $current_question[] = $line; // Thêm dòng chứa đáp án
                    displayQuestion($current_question, ++$question_number);
                    $current_question = []; // Reset câu hỏi
                } elseif (trim($line) !== "") {
                    $current_question[] = $line;
                }
            }
        } else {
            echo "<div class='alert alert-danger'>File câu hỏi không tồn tại.</div>";
        }

        function displayQuestion($question, $number)
        {
            echo "<div class='card mb-4'>";
            echo "<div class='card-header'><strong>Câu $number: {$question[0]}</strong></div>";
            echo "<div class='card-body'>";
            for ($i = 1; $i < count($question) - 1; $i++) { // Bỏ dòng chứa "ANSWER:"
                $answer = substr($question[$i], 0, 1); // A, B, C, D
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
                echo "<label class='form-check-label' for='question{$number}{$answer}'>{$question[$i]}</label>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        }
        ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>
</body>
</html>
