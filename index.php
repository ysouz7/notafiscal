<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trabalho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="">

    <h2> Loja de roupas - calculo de frete </h2>

    <form action="processa.php" method="POST">

        Nome do cliente:

        <input type="text" name="nome" required>

        Valor da compra (R$):

        <input type="number" name="valor" required>

        Peso das roupas (kg):

        <input type="number" name="peso" required>

        Distância de entrega (km):

        <input type="number" name="distancia" required>

        Tipo de produto:

        <select name="produto">

            <option value="normal">normal</option>

            <option value="fragil">fragil</option>

        </select>

        Tipo de entrega:

        <select name="entrega">

            <option value="economica">Econômica</option>

            <option value="normal">Normal</option>

            <option value="expressa">Expressa</option>

        </select>

        <button type="submit">Finalizar Compra</button>
    </form>
</body>
</html>