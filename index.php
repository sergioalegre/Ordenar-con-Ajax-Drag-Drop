<?php 
	include("conexion.php");

	$query = mysql_query("SELECT * FROM articulos ORDER BY orden_articulo");
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>Ordenar registros con Ajax y efecto Drag'n Drop</title>
<script src="jquery.js"></script>
<script src="jquery-ui-1.8.12.custom.min.js"></script>

<style>
	body{ 
		margin:0; 
		padding:0
	}
	.content{
		padding-top:20px;
		width:600px;
		margin:0 auto;
	}
	ul{
		list-style:none;
		margin:0;
		padding:0
	}
	ul li{
		display:block;
		background:#F6F6F6;
		border:1px solid #CCC;
		color:#3594C4;
		margin-top:3px;
		height:20px;
		padding:3px;
	}
	.ui-state-highlight{ background:#FFF0A5; border:1px solid #FED22F}
	.msg{
		color:#0C0;
		font:normal 11px Tahoma
	}
	.center{
		text-align: center;
	}
</style>

<script>
	$(document).ready(function(){
		$("ul#articulos").sortable({ placeholder: "ui-state-highlight",opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize");
			$.post("order.php", order, function(respuesta){
				$(".msg").html(respuesta).fadeIn("fast").fadeOut(2500);
			});
		}
		});
	});
</script>

</head>
<body>
	<div class="content">
		<div class="center"><img src="logo.jpg" width="200px"></div>
		<h3>Arrastrales para ordenarlos en la base de datos</h3>
	    
		<ul id="articulos">
	    	<?php 
			while($row = mysql_fetch_array($query))
			{ ?>
				<li id="articulo-<?php echo $row['id_articulo'] ?>"><?php echo $row['nombre_articulo'] ?></li>
				
	  <?php } ?>
	    </ul>
	    <div class="msg"></div>
	</div>
	<br><br>
	<div class="center">Sergio Alegre - <a href="https://twitter.com/naarean">@naarean</a> - <a href="https://github.com/sergioalegre">github.com/sergioalegre</a></div>
</body>
</html>
