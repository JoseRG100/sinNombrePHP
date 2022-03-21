<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Tienda de Camisetas</title>
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
		<div id="container-fluid">
			<!-- HEADER -->
			<header class="row">
				<div class="col logo">
					<a href="index.php"><img src="" alt="logo">LOGONAME</a>
				</div>
				<!-- NAVBAR -->
				<nav id="col menu">
					<ul>
						<li>
							<a href="#">Inicio</a>
						</li>
						<li>
							<a href="#">Cat - 1</a>
						</li>
						<li>
							<a href="#">Cat - 2</a>
						</li>
					</ul>
				</nav>
			</header>

			<div id="content">

				<!-- BARRA LATERAL -->
				<aside id="lateral">

					<div id="login" class="block_aside">
						<h3>Entrar a la web</h3>
						<form action="#" method="post">
							<label for="email">Email</label>
							<input type="email" name="email" />
							<label for="password">Contraseña</label>
							<input type="password" name="password" />
							<input type="submit" value="Enviar" />
						</form>
						
						<ul>
							<li><a href="#">Mis pedidos</a></li>
							<li><a href="#">Gestionar pedidos</a></li>
							<li><a href="#">Gestionar categorias</a></li>
						</ul>
					</div>

				</aside>

			

			<!-- PIE DE PÁGINA -->
			<footer id="footer">
				<p>Desarrollado por Víctor Robles WEB &copy; <?= date('Y') ?></p>
			</footer>
		</div>
	</body>
</html>
