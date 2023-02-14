<?php
// Define o número de lados do dado
$num_lados = 6;

// Verifica se o histórico de resultados já foi iniciado
if (!isset($_SESSION['dado_resultados'])) {
  // Se não, inicia o histórico de resultados com um array vazio
  $_SESSION['dado_resultados'] = array();
}

// Verifica se o usuário clicou no botão "Lançar Dado"
if (isset($_POST['lancar_dado'])) {
  // Gera um número aleatório entre 1 e o número de lados
  $resultado = rand(1, $num_lados);

  // Adiciona o resultado ao histórico de resultados
  array_push($_SESSION['dado_resultados'], $resultado);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dado Virtual</title>
  </head>
  <body>
    <h1>Dado Virtual de <?php echo $num_lados; ?> lados</h1>

    <?php if (isset($resultado)) : ?>
      <p>O resultado do dado é: <?php echo $resultado; ?></p>
    <?php endif; ?>

    <form method="post">
      <button type="submit" name="lancar_dado">Lançar Dado</button>
    </form>

    <h2>Histórico de resultados</h2>
    <ul>
      <?php foreach ($_SESSION['dado_resultados'] as $resultado) : ?>
        <li><?php echo $resultado; ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
