<?php

	//initialisation de la session
	session_start();
	
?>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Mon blog un peu naze</title>
		<link rel="stylesheet" type="text/css" href="Style.css">
		<script src="script.js"></script>
	</head>

	<body>

		<div id="butdc" ><a href="Logout.php">Se déconnecter</a></div>
	
		<header>
			<h1>Le blog du partage et de l'amour</h1>
		</header>

		<div>
			
			<h3>Les derniers messages de la communauté :</h3><br/>
			
			<?php
			
				$date=date("d-m-Y");
			
				if (isset($_POST['pseudo']) AND isset($_POST['titre']) AND isset($_POST['message']))  //on vérifie si le formulaire était rempli
				{
					$fileblog="Articles.txt";
					$fileblogopen=(fopen($fileblog,"a+"));
						
					//on ajoute les nouvelles données
					fwrite($fileblogopen,"Message de ".htmlspecialchars($_POST['pseudo'])." le ".$date.PHP_EOL);
					fwrite($fileblogopen,htmlspecialchars($_POST['titre']).PHP_EOL);
					fwrite($fileblogopen,htmlspecialchars($_POST['message']).PHP_EOL);
					fwrite($fileblogopen,' '.PHP_EOL);
			
					$corps=file("Articles.txt");
					echo implode("</br>",$corps);  //affichage des articles
					
					fclose($fileblogopen);
					
					$_POST = array();
					
				}
					
			?>
		</div>
		
		<footer id="formu" >
			<p>Envie de partager quelque chose avec la communauté ?</p>
			<form action="#" method="POST" >  
				<p>
					<label for="pseudo">Pseudo : </label><Input type="text" name="pseudo" />
				</p>
				<p>
					<label for="titre">Titre : </label><Input type="text" name="titre" />
				</p>
				<p>
					Votre message : <textarea name="message" placeholder="Votre message.">Nouveau message</textarea>
				</p>
				<p>
					<Input type="submit" value="Publier" />
				</p>
			</form>
		</footer>
		
	</body>

</html>