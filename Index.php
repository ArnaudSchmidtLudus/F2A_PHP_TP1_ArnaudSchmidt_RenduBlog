<?php
	
	//initialisation de la session
	session_start();
	
	//on choisit le fichier et on écrit sur les deux premières lignes
	$file="Identifiants.txt";
	$fileopen=(fopen($file,"a+"));
	fwrite($fileopen,"Darkevin666".PHP_EOL);
	fwrite($fileopen,"j3su1str0d4rk".PHP_EOL);
	
	//on transfère le contenu du fichier dans un tableau puis on extrait les valeurs pour les stocker dans la session
	$read=file($file);
	$_SESSION['identifiant']= rtrim($read[0]);
	$_SESSION['motdepasse']= rtrim($read[1]);
	
	//on referme le fichier texte
	fclose($fileopen);
	
?>
	

<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Mon blog un peu naze</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<script src="script.js"></script>
</head>

<body>

	<header>
		<h1>Le blog du partage et de l'amour</h1>
	</header>

	<div>
		<?php
		
			if (isset($_POST['id']) and isset($_POST['mdp']))
			{
				if ($_SESSION['identifiant']!=$_POST['id'] OR $_SESSION['motdepasse']!=$_POST['mdp'])
				{
					echo "L'identifiant ou le mot de passe est incorrect, veuillez réessayer.";
				}
				else
				{
					echo '<a href="Forum.php" >Accéder au forum</a>'; //un lien vers la page contenant le formulaire et les publications
				}
			}
		
		?>
	</div>
	
	<footer id="log" >
			<p>Identifiez vous !</p>
			<form action="#" method="POST" >
				<p>
					<label for="pseudo">Identifiant : </label><Input type="text" name="id" />
				</p>
				<p>
					<label for="titre">Mot de passe : </label><Input type="password" name="mdp" />
				</p>
				<p>
					<Input type="submit" value="Publier" />
				</p>
			</form>
		</footer>
	
</body>

</html>
