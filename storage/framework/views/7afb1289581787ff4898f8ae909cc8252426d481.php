<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><?php echo e(env("APP_NAME")); ?> | <?php echo $__env->yieldContent('title'); ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
	<?php echo $__env->yieldContent('styles'); ?>
</head>
<body id="main">
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="<?php echo e(route('index')); ?>">
			<img src="<?php echo e(asset('images/alumnifa.svg')); ?>" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar-menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php echo e(Request::route()->getName() === 'index' ? 'active' : null); ?>"><a class="nav-link" href="<?php echo e(route('index')); ?>">Accueil</a></li>
				<li class="nav-item <?php echo e(Request::route()->getName() === 'directory' ? 'active' : null); ?>"><a class="nav-link" href="<?php echo e(route('directory')); ?>">Annuaire</a></li>
				<li class="nav-item <?php echo e(Request::route()->getName() === 'search' ? 'active' : null); ?>"><a class="nav-link" href="#">Recherche avancée</a></li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if(auth()->guard()->check()): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo e(Auth::user()->pseudo); ?>

					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Mon profil</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo e(route('account.logout')); ?>">Déconnexion</a>
					</div>
				</li>
				<?php endif; ?>
				<?php if(auth()->guard()->guest()): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Mon compte
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo e(route('auth.login')); ?>">Se connecter</a>
					<a class="dropdown-item" href="<?php echo e(route('auth.register')); ?>">S'inscrire</a>
						<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('password.request')); ?>">Mot de passe oublié ?</a>
					</div>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>

	<?php echo $__env->yieldContent('content'); ?>

	<footer class="footer">
		<section class="footer-brand">
			<img src="<?php echo e(asset('images/alumnifa.svg')); ?>" alt="<?php echo e(env('APP_NAME')); ?>">
		</section>
		<section class="footer-content">
			<section class="footer-address">
				<h4>Institut français des Affaires</h4>
				<ul>
					<li>4, rue Saint-Charles</li>
					<li>57000 Metz</li>
					<li>03 87 74 00 75</li>
				</ul>
			</section>
			<section class="footer-links">
				<h4>Liens utiles</h4>
				<ul>
					<li>Contactez-nous</li>
					<li>Plan du site</li>
					<li>Mentions légales</li>
				</ul>
			</section>
		</section>
	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" async defer></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="<?php echo e(asset('js/alumnifa.js')); ?>"></script>
	<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\outils\xampp\htdocs\alumnifa\resources\views/layouts/app.blade.php ENDPATH**/ ?>