<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amigo Secreto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script>
    function reload() {
      location.reload();
    }
  </script>
</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Amigo Secreto</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="./">Home</a>
        <a class="nav-link fw-bold py-1 px-0" href="admin.php">Admin</a>
        <a class="nav-link fw-bold py-1 px-0" href="contato.php">Contato</a>
      </nav>
    </div>
  </header>

	<main class="px-3">
		<section class="mb-5">
        </section>
    </main>

<?php

$id_amigo = $_GET['amigo'];

$string = file_get_contents("amigo_secreto.json");
if ($string === false) {
    // deal with error...
}

$json_a = json_decode($string, true);
if ($json_a === null) {
    // deal with error...
}

foreach ($json_a as $person_name => $person_a) {
		if($id_amigo == $person_a['id']) {
			echo 'Olá <h3>' . $person_a['name'] . '</h3> seu amigo é... ';
			echo '<h3>'.$person_a['friend'].'</h3>';
		}
}

?>
<footer class="mt-auto text-white-50">
    <p>Copyright &copy; 2022 <a href="https://ydeia.com/" class="text-white">YDEIA.com</a>, by <a href="https://dancodes.dev" class="text-white">@dancodes</a>.</p>
  </footer>
</div>
</body>
</html>