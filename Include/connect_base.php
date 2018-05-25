

<?php 
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
{
	try{
		$base=new PDO('mysql:host=localhost;dbname=ideevent','root'); 
	} 	catch(PDOException $e){
		die('Erreur : '.$e->getMessage());
}
}
else{
try{
	$base=new PDO('mysql:host=localhost:8889;dbname=ideevent','root','root'); 
} catch(PDOException $e){
	die('Erreur : '.$e->getMessage());
}
}
?>
