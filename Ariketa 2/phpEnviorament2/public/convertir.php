<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <title>Moneta Aldaketa Kalkulagailua</title>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
</head>

<body>

    <h1>Moneta Aldaketa Kalkulagailua</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kantitatea = isset($_POST['kantitatea']) ? floatval($_POST['kantitatea']) : 0;
        $dirua = isset($_POST['dirua']) ? $_POST['dirua'] : '';

        if ($kantitatea > 0 && in_array($dirua, ['USD', 'GBP', 'ARS'])) {
            $tasak = [
                'USD' => 1.08,
                'GBP' => 0.86,
                'ARS' => 889.65
            ];

            $resultado = $kantitatea * $tasak[$dirua];

            echo "<p>{$kantitatea} eurok {$resultado} {$dirua}-ra bihurtu dira.</p>";
        } else {
            echo '<p>Errorea gertatu da.</p>';
        }
    }
    ?>

    <a href="index.html">Itzuli</a>

</body>

</html>