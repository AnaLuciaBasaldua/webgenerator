<?php
	session_start();
	if (isset($_SESSION['email'])){
		header("Location: panel.php");
	}
	include 'credenciales.php';
	$msg="";
	if(isset($_POST["btn"])){
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$passRP = $_POST['passwordRP'];
		$conexion = mysqli_connect(HOST,USER,PASS,DB);
		$ssql="SELECT * FROM usuarios";
		$response= mysqli_query($conexion,$ssql);
		$mostrar=true;
		//var_dump($response);
		if(mysqli_num_rows($response)>0){
			while($fila=mysqli_fetch_array($response,MYSQLI_ASSOC)){
				if ($fila["email"]==$email){
					$msg="¡El email ya está registrado!";
					$mostrar=false;
				}
			}
			if($mostrar){
				if($pass!=$passRP){
					$msg="¡Las contraseñas no son iguales!";
				}else{
					$date=date("Y-m-d");
					$sql='INSERT INTO `usuarios`(`idUsuario`, `email`, `password`, `fechaRegistro`)VALUES (null, "'.$email.'","'.$pass.'","'.$date.'")';
					if (mysqli_query($conexion, $sql)) {
      					$msg="¡Nuevo usuario creado correctamente!";
      					header("Location: login.php");
					} else {
      					$msg="Error: ".$sql."<br>".mysqli_error($conexion);
					}
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Register</title>

	<style>
		:root {
		    --color-primary: #80CBC4; /*teal lighten-3*/
			--color-secondary: #E0F2F1; /*teal lighten-5*/
			--color-web: #00695C;  /*teal darken-3*/
		    --color-dark: #004d40; /*teal darken-4*/
		    --color-light: #FBFBFB;
		}
		body {
    		display: flex;
    		min-height: 100vh;
   		 	flex-direction: column;
   		 	background-color: #00695C;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 200 200'%3E%3Cg %3E%3Cpolygon fill='%23418d86' points='100 57.1 64 93.1 71.5 100.6 100 72.1'/%3E%3Cpolygon fill='%2361aba5' points='100 57.1 100 72.1 128.6 100.6 136.1 93.1'/%3E%3Cpolygon fill='%23418d86' points='100 163.2 100 178.2 170.7 107.5 170.8 92.4'/%3E%3Cpolygon fill='%2361aba5' points='100 163.2 29.2 92.5 29.2 107.5 100 178.2'/%3E%3Cpath fill='%2380CBC4' d='M100 21.8L29.2 92.5l70.7 70.7l70.7-70.7L100 21.8z M100 127.9L64.6 92.5L100 57.1l35.4 35.4L100 127.9z'/%3E%3Cpolygon fill='%2393a4a3' points='0 157.1 0 172.1 28.6 200.6 36.1 193.1'/%3E%3Cpolygon fill='%23b9cac9' points='70.7 200 70.8 192.4 63.2 200'/%3E%3Cpolygon fill='%23E0F2F1' points='27.8 200 63.2 200 70.7 192.5 0 121.8 0 157.2 35.3 192.5'/%3E%3Cpolygon fill='%23b9cac9' points='200 157.1 164 193.1 171.5 200.6 200 172.1'/%3E%3Cpolygon fill='%2393a4a3' points='136.7 200 129.2 192.5 129.2 200'/%3E%3Cpolygon fill='%23E0F2F1' points='172.1 200 164.6 192.5 200 157.1 200 157.2 200 121.8 200 121.8 129.2 192.5 136.7 200'/%3E%3Cpolygon fill='%2393a4a3' points='129.2 0 129.2 7.5 200 78.2 200 63.2 136.7 0'/%3E%3Cpolygon fill='%23E0F2F1' points='200 27.8 200 27.9 172.1 0 136.7 0 200 63.2 200 63.2'/%3E%3Cpolygon fill='%23b9cac9' points='63.2 0 0 63.2 0 78.2 70.7 7.5 70.7 0'/%3E%3Cpolygon fill='%23E0F2F1' points='0 63.2 63.2 0 27.8 0 0 27.8'/%3E%3C/g%3E%3C/svg%3E");
  		}		

	  	main {
	    	flex: 1 0 auto;
	  	}
	  	.msg{
	  		margin-left: 50px; 
	  		color: var(--color-dark);
	  		font-size: 20px;
	  
	  	}
	  	a{
	  		text-decoration: none;
	  		color: var(--color-primary);
	  	}
	  	input .ee{
	  		color: white;
	  	}
	</style>
</head>



<body>
	<nav>
	    <div class="nav-wrapper  teal darken-4">
	      	<a href="#" class="brand-logo center">¡Registrarte es simple!</a>
	    </div>
  	</nav>
  	<br>
  	<br>
  	<br>

  	<content>
  		<di class="row">
	      	<div class="card col s10 m6 l6 offset-s1 offset-m3 offset-l3">
	        	<div class="window">
		            <div class="window_container">
		            	<br>
						<form method="POST">
							<div class="row">
						        <div class="input-field col s10 m10 l10 offset-s1 offset-m1 offset-l1">
						          	<input id="email" type="email" class="validate" name="email">
						          	<label for="email">Email:</label>
						        </div>
						    </div>
		                    <div class="row">
						        <div class="input-field col s10 m10 l10 offset-s1 offset-m1 offset-l1">
						          	<input id="password" type="password" class="validate" name="password">
						          	<label for="password">Contraseña:</label>
						        </div>
						    </div>
						    <div class="row">
						        <div class="input-field col s10 m10 l10 offset-s1 offset-m1 offset-l1">
						          	<input id="passwordRP" type="password" class="validate" name="passwordRP">
						          	<label for="passwordRP">Repetir Contraseña:</label>
						        </div>
						    </div>
						    <div class="row">
						    	<div class="col offset-s4 offset-m4 offset-l5">
						    		<input type="submit" class="center-align waves-effect waves-light btn ee" id="btnRegistrar" name="btn" value="Registrar">
						    	</div>
						    </div>
						    <div class="msg">
						    	<?php
									echo $msg;
								?>
						    </div>
							<div class="window_options center ">
		                        ¿Ya tienes cuenta? ¡Volver a <a href="login.php">Inicio </a>!
		                    </div>
		                    <br>
		                </form>
		            </div>
	        	</div>
	      	</div>
      	</div>
    </content>


    <br>
  	<br>
  	<br>

  	<main></main>
  	<footer class="page-footer  teal darken-4">
        <div class="container">
            <div class="row">
              	<div class="col l6 s12">
                	<h5 class="white-text">Web Generator</h5>
                	<p class="grey-text text-lighten-4">Presentado por Ana Lucía Basaldúa.</p>
              	</div>
	            <div class="col l4 offset-l2 s12">
	                <h5 class="white-text">Redes</h5>
	                <ul>
	                  	<li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
	                  	<li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
	                  	<li><a class="grey-text text-lighten-3" href="#!">WhatsApp</a></li>
	                </ul>
	          	</div>
            </div>
        </div>
      	<div class="footer-copyright">
        	<div class="container">
        		WebGenerator © 2022Copyright 
        		<a class="grey-text text-lighten-4 right" href="#!">A.L.B</a>
        	</div>
      	</div>
    </footer>


	 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>	
</body>
</html>
