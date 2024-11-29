<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Лабораторная работа №9 - Мочалова Анастасия Вячеславовна - Группа 231-362
    </title>
    <link rel="stylesheet" href="styles/styles.css" />
</head>

<body>
    <header>
        <img class="logo" src="images/logo.png" alt="Логотип университета" style="width: 15%">
        <h1>Лабораторная работа №9</h1>
        <p>Мочалова Анастасия Вячеславовна - Группа 231-362</p>
        <p>Вариант 11 (1)</p>
    </header>

    <main>
        <?php
        // Переменные для функции
        $x_start = 10; // начальное значение
        $step = 1; // шаг изменения аргумента
        $x_max = 30; // максимальное значение аргумента
        $min_value = PHP_INT_MAX;
        $max_value = PHP_INT_MIN;
        $sum = 0;
        $count = 0;

        $layout_type = 'E';
        $layout_names = [
            'A' => 'Простая верстка текстом',
            'B' => 'Маркированный список',
            'C' => 'Нумерованный список',
            'D' => 'Табличная верстка',
            'E' => 'Блочная верстка'
        ];

        // Функция для вычисления значений
        function calculate_function($x)
        {
            if ($x <= 10) {
                return 10 * $x - 5;
            } elseif ($x > 10 && $x < 20) {
                return ($x + 3) * $x * $x;
            } elseif ($x >= 20) {

                if ($x == 25) { //деление на ноль
                    $count = -1;
                    return 0;
                } else {
                    return 3 / ($x - 25);
                }
            } else {
                return null;  // Если x не попадает ни в одно из условий
            }
        }

        // Вывод по типу верстки
        switch ($layout_type) {
            case 'A':
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate_function($x);

                    if ($x != 25) {
                        echo "f($x)=" . round($y, 3) . "<br>";
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    } else {
                        echo "f($x)= error <br>";
                    }
                }
                break;

            case 'B':
                echo "<ul>";
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    $y = calculate_function($x);

                    if ($x != 25) {
                        echo "<li>f($x)=" . round($y, 3) . "</li><br>";
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    } else {
                        echo "<li>f($x)= error </li><br>";
                    }
                }
                echo "</ul>";
                break;

            case 'C':
                echo "<ol>";
                for ($x = $x_start; $x <= $x_max; $x += $step) {

                    $y = calculate_function($x);

                    if ($x != 25) {
                        echo "<li>f($x)=" . round($y, 3) . "</li><br>";
                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    } else {
                        echo "<li>f($x)= error </li><br>";
                    }
                }
                echo "</ol>";
                break;

            case 'D':
                echo "<table border='1'><tr><th>#</th><th>Аргумент</th><th>Значение</th></tr>";
                $row = 1;
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    if ($x != 25) { 
                        $y = calculate_function($x);
                        echo "<tr><td>$row</td><td>$x</td><td>" . round($y, 3) . "</td></tr>";

                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    } else {
                        echo "<tr><td>$row</td><td>$x</td><td>error</td></tr>";
                    }
                    $row++;
                }
                echo "</table>";
                break;

            case 'E':
                for ($x = $x_start; $x <= $x_max; $x += $step) {
                    if ($x != 25) { 
                        $y = calculate_function($x);
                        echo "<div style='display:inline-block; border: 2px solid red; margin: 8px;'>f($x)=" . round($y, 3) . "</div>";

                        $min_value = min($min_value, $y);
                        $max_value = max($max_value, $y);
                        $sum += $y;
                        $count++;
                    } else {
                        echo "<div style='display:inline-block; border: 2px solid red; margin: 8px;'>f($x)=error</div>";
                    }
                }
                break;
        }

        // Вычисление дополнительных параметров
        $average = $count > 0 ? $sum / $count : 0;
        echo "<p>Минимум: " . round($min_value, 3) . "</p>";
        echo "<p>Максимум: " . round($max_value, 3) . "</p>";
        echo "<p>Сумма: " . round($sum, 3) . "</p>";
        echo "<p>Среднее: " . round($average, 3) . "</p>";
        ?>
    </main>

    <footer>
        <p>Тип верстки: <?php echo $layout_names[$layout_type]; ?></p>
    </footer>
</body>

</html>