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
    var password = prompt("Enter in the password");
        if (password=="1234") {
            //location = "media.html"
            window.location.href="admin.php?status=logged";

        }
        else{
          window.location.href="./";
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
			<h1>Bóra modernizar esse amigo secreto?</h1>
			<p class="lead">Chega de #fraude =)</p>
		</section>

		<section class="mb-auto">
			<h3 class="mb-3">Admin Área</h3>

			<div class="container text-center">
				<div class="row">

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