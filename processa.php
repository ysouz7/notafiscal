<?php
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$peso = $_POST['peso'];
$distancia = $_POST['distancia'];
$produto = $_POST['produto'];
$entrega = $_POST['entrega'];

$total = 0;
$detalhes = "";

if ($valor > 500) {
    $total = 0;
    $detalhes .= "Frete grátis em compras acima de R$500<br>";
} else {

    switch ($entrega) {

        case "economica":
            if ($peso <= 5) {
                $total += 10;
                $detalhes .= "Frete econômico: R$10<br>";
            } else {
                $total += 20;
                $detalhes .= "Frete econômico: R$20<br>";
            }

            if ($distancia > 100) {
                $total += 10;
                $detalhes .= "Distância longa: +R$10<br>";
            }

            if ($distancia <= 50) $prazo = "3 dias";
            else if ($distancia <= 200) $prazo = "5 dias";
            else $prazo = "8 dias";
        break;

        case "normal":
            if ($peso <= 5) {
                $total += 20;
                $detalhes .= "Frete normal: R$20<br>";
            } elseif ($peso <= 10) {
                $total += 35;
                $detalhes .= "Frete normal: R$35<br>";
            } else {
                $total += 50;
                $detalhes .= "Frete normal: R$50<br>";
            }

            if ($distancia > 100) {
                $total += 15;
                $detalhes .= "Distância longa: +R$15<br>";
            }

            if ($distancia <= 50) $prazo = "2 dias";
            else if ($distancia <= 200) $prazo = "4 dias";
            else $prazo = "6 dias";
        break;

        case "expressa":
            $total += 50;
            $detalhes .= "Entrega expressa: R$50<br>";

            if ($peso > 10) {
                $total += 20;
                $detalhes .= "Peso extra: +R$20<br>";
            }

            if ($distancia > 100) {
                $total += 20;
                $detalhes .= "Distância longa: +R$20<br>";
            }

            $prazo = "1 a 2 dias";
        break;
    }

    if ($distancia > 200) {
        $extra = $distancia - 200;
        $total += $extra;
        $detalhes .= "Km extra: +R$" . $extra . "<br>";
    }

    if ($produto == "fragil") {
        $total += 15;
        $detalhes .= "Roupa delicada: +R$15<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nota Fiscal</title>
    <style>
        body { font-family: Arial; background: #fff0f5; }
        .nota { width: 400px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
    </style>
</head>
<body>

<div class="nota">
    <h2>Nota Fiscal</h2>

    <p><strong>Cliente:</strong> <?= $nome ?></p>
    <p><strong>Compra:</strong> R$<?= $valor ?></p>

    <h3>Detalhes:</h3>
    <p><?= $detalhes ?></p>

    <h3>Total do frete: R$<?= $total ?></h3>
    <p><strong>Prazo:</strong> <?= isset($prazo) ? $prazo : "—" ?></p>
</div>

</body>
</html>