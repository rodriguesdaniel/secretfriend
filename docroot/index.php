<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amigo Secreto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css?v=3">
  <script>
    function reload() {
      location.reload();
    }
  </script>
</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
  <?php include('includes/nav.php');?>
  </header>

	<main class="px-3">
		<section class="mb-5">
			<?php
				@$msg = $_GET['msg'];
				
				if (!empty($msg)) {
					echo '<div class="alert alert-danger" role="alert">
					<h2>
					' . $msg . '
					</h2>
					</div>';
				}else {

			?>
			<h1>Bóra modernizar esse amigo secreto?</h1>
			<p class="lead">Chega de #fraude =)</p>

			<?php } ?>
		</section>

		<section class="mb-auto">
			<h3 class="mb-3">Participantes</h3>

			<div class="container text-center">
				<div class="row">
					<?php include('participantes.php') ;?>
				</div>
			</div>
		</section>

	</main>
	<footer class="mt-auto text-white-50">
    <p>Copyright &copy; 2022 <a href="https://ydeia.com/" class="text-white">YDEIA.com</a>, by <a href="https://dancodes.dev" class="text-white">@dancodes</a>.</p>
  </footer>
</div>
</body>
</html>