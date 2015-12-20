<header>
	<div class="wrapper">
		<h1>Noticias eNubes</h1>
		<nav>
		<?php if(!isset($_SESSION['nombre'])): ?>
			<ul>						
				<li><a href="#modalInicio">Inicie sesión</a></li>
				<li><a href="#modalRegistro">Regístrese</a></li>
			</ul>
		<?php else : ?>
			<ul>						
				<li>Logueado como <?php print $_SESSION['nombre']; ?></li>
				<li><a href="#modalCerrar">Cerrar sesión</a></li>
			</ul>
		<?php endif; ?>
		</nav>
		<div class="clear"></div>
		<nav class="navDown">
			<ul>
				<li><a href="/">Inicio</a></li>
				<li><a href="index.php?c=usuario&a=index">Cine</a></li>
				<li><a href="index.php?c=noticia&a=index">Deportes</a></li>
				<li><a href="#">Libros</a></li>
				<li><a href="#">Música</a></li>					
			</ul>			
		</nav>
	</div>
</header>