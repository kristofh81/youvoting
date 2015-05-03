<?php  
require_once 'process.php';
require_once 'model/Poll.php';

$getcode = sanitize($_GET["formid"]);

$foo = new Poll();

$allPolls = $foo->getContent();


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style-form-ex.css" media="all">
</head>
<body>

<?php
echo '<form method="post" action="http://www.youvoting.it" id="'.$getcode.'" class="form model frame">';
foreach ($allPolls as $onePoll) {
	foreach ($onePoll as $key => $value) {
		if($key == 'formid' && $value == $getcode){
				echo '<h2>' . $onePoll['title'] . '</h2>';
			for ($i=1; $i < count($onePoll)-2 ; $i++) { 
				echo $onePoll['question'.$i] . '<br><input type="text" class="text-type" id="question'.$i.'"><br>';
			}
		}		
	}
}
echo '<input type="submit" value="ok!">';
echo '</form>';
?>
		
</body>
</html>