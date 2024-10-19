<?php
// Função para realizar o Bubble Sort
function bubbleSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Troca os elementos
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

$sortedArray = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os números da entrada e os separa
    $numbers = explode(',', $_POST['numbers']);
    // Remove espaços e converte para um array de inteiros
    $numbers = array_map('trim', $numbers);
    $numbers = array_map('intval', $numbers);
    // Ordena os números
    $sortedArray = bubbleSort($numbers);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Sort em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Bubble Sort em PHP</h1>
    <form method="post">
        <input type="text" name="numbers" placeholder="Insira números separados por vírgula" required>
        <input type="submit" value="Ordenar">
    </form>

    <?php if (!empty($sortedArray)): ?>
        <div class="result">
            <p>Números ordenados: <?php echo implode(', ', $sortedArray); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
