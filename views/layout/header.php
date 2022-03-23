<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Campus virtual</title>
                 <link rel="stylesheet" href="<?=base_url?>/css/styles.css" /> 
                
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header">
				<div id="logo">
					<img src="assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="index.php">
						Campus virtual
					</a>
				</div>
			</header>
                         <?php $cursos = Utils::showCursos(); ?>
			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="#">Inicio</a>
					</li>
                                        <?php while($cur = $cursos->fetch_object()): ?>                                     
                                        
					<li>
						<a href="#"><?=$cur->name?></a>
					</li>
                                        <?php endwhile; ?>
					
                                       
				</ul>
			</nav>

			<div id="content">