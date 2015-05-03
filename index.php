
<?php
	session_start();
	require_once 'process.php';

	if (isset($_GET['success'])) { 
	 	$formid = sanitize($_GET['formid']);
	 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Youvoting Survey Task</title>
	<link rel="stylesheet" href="css/style.css" media="all">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	

  	<!--jquery script to append extra questions-->
  	<script type="text/javascript">
  		$(document).ready(function(){

    		$("#btn-add").click(function(){
        	$("ol").append('<li><input type="text" class="text-type" id="question2" name="questions[]"></li>');
    		});
		});
  	</script>

  	<script type="text/javascript">
	
  	$(document).ready(function(){
 
    $("#getcode").click(function(){

    	//$.getJSON("data/polldata.json" , function(data) {		
																// !!here formid has to be the code !! 
			var output = '&lt;iframe src=&quot;form-example.php?formid=<?=$formid?>&quot;width=&quot;600&quot; height=&quot;450&quot; frameborder=&quot;0&quot; style=&quot;border:0&quot;&gt;&lt;/iframe&gt;';

			//testing ajax to get json data
			//for (var key in data) {
    		//	if (data.hasOwnProperty(key)) {
    	 	//	output += (data[key]["title"] + " <br> " + data[key]["question1"]);
    		//	}
  			//}
			//output += '&lt;/iframe&gt;'
    		$('#result').html(output);
		//});

	});

	});
  </script>
</head>
<body>
	
	<div class="center">
		<h2>Crea un sondaggio</h2>
		<form action="process.php" method="post" id="poll">
			Titolo:
			<textarea name="title" placeholder="Titolo del sondaggio..."></textarea><br>
			Immagine:<input type="file" id="image" name="image"><br>
			<div id="domande">

				<ol>
					<li>La prima domanda:
					<input type="text" class="text-type" id="question1" name="questions[]" required>
					</li>
					<li>La seconda domanda:
					<input type="text" class="text-type" id="question2" name="questions[]" required>
					</li>
				</ol>							
					<!--here comes extra questions-->

				&nbsp;&raquo; <button id="btn-add">Aggiungi un altra domanda</button><br><br><hr>
			</div>

			 
			
			<input type="submit" value="crea sondaggio">
		</form>
	</div>

	 <?php if (isset($_GET['success'])) { 
	 	$formid = sanitize($_GET['formid']);
	 ?>
	<div id="result" class="center">
		esempio sotto:
		<button id="getcode">Get Code</button>
		<div>
		<iframe src="form-example.php?formid=<?=$formid;?>" width="324" height="300" frameborder="0" style="border:0"></iframe>
		</div>
	</div>


  	<?php }; ?>


</body>
</html>


