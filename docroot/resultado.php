<?php
  $id_participante = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amigo Secreto</title>
	<meta property="og:title" content="Amigo Secreto | Só Piolho">
  <meta property="og:site_name" content="Amigo Secreto | Só Piolho">
  <meta property="og:url" content="https://www.ydeia.com/amigosecreto/resultado.php?id=<?=$id_participante;?>">
  <meta property="og:description" content="Amigo secreto da família mais chatinha da região! Só clicar e ver seu amigo ou amiga secreta!">
  <meta property="og:type" content="website">
  <meta property="og:image" itemprop="image" content="https://www.ydeia.com/amigosecreto/images/tia.jpg">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="ydeia.com">
  <meta property="twitter:url" content="https://www.ydeia.com/amigosecreto/resultado.php">
  <meta name="twitter:title" content="Amigo Secreto | Só Piolho">
  <meta name="twitter:description" content="Amigo secreto da família mais chatinha da região! Só clicar e ver seu amigo ou amiga secreta!">
  <meta name="twitter:image" itemprop="image" content="https://www.ydeia.com/amigosecreto/images/tia.jpg">
  
  <meta name="robots" content="noindex,nofollow">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <?php include('nav.php');?>
  </header>

	<main class="px-3">
    
<?php
  $string = file_get_contents("amigo_secreto.json");
  if ($string === false) {
      // deal with error...
  }

  $json_a = json_decode($string, true);
  if ($json_a === null) {
      // deal with error...
  }

  foreach ($json_a as $key => $person) {
      if($id_participante == $person['id']) {
        echo '<h4>Olá ' . $person['name'] . ', seu amigo é...</h4>';

        echo '<div class="alert alert-warning mt-3" role="alert">';
        echo '<h3>'.$person['friend'].'</h3>';
        echo '</div>';

        
      }
  }
?>
</main>
<footer class="mt-auto text-white-50">
    <p>Copyright &copy; 2022 <a href="https://ydeia.com/" class="text-white">YDEIA.com</a>, by <a href="https://dancodes.dev" class="text-white">@dancodes</a>.</p>
  </footer>
</div>
</body>
</html>