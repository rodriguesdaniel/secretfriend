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
    /* var password = prompt("Enter in the password");
        if (password=="1234") {
            //location = "media.html"
            window.location.href="admin.php?status=logged";

        }
        else{
          window.location.href="./";
        } */
  </script>
</head>
<body class="d-flex h-100 text-center text-bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <?php include('nav.php');?>
  </header>

	<main class="px-3">
		<section class="mb-auto">
    <?php
      @$msg = $_GET['msg'];
    
      if(!empty($msg)){
        echo '<div class="alert alert-danger" role="alert">
          ' . $msg . '
        </div>';
      }
    ?>

			<h3 class="mb-3 text-left">Cadastre-se</h3>

			<div class="container">
				<div class="row">
        <form action="add.php" method="POST">
          <div class="row">
            <div class="col col-12 mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="col col-12 mb-3">
              <input type="number" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp" autocomplete="off" required>
            </div>
            <div class="col col-12 mb-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
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