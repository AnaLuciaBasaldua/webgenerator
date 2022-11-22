<?php
	include 'credenciales.php';
	$conexion = mysqli_connect(HOST,USER,PASS,DB);
	$ssql = "SELECT * FROM `webs`";
	$response = mysqli_query($conexion,$ssql);
	$lista = "<table class='responsive-table highlight'>";
	while($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
		$lista.= '<tr>
					<td>
						<a href="../'.$fila["idUsuario"].'">'.$fila["idUsuario"].'</a>
					</td>
					<td>
						<a href="../'.$fila["dominio"].'">'.$fila["dominio"].'</a>
					</td>
					<td>
						<a href="../'.$fila["fechaCreacion"].'">'.$fila["fechaCreacion"].'</a>
					</td>
				</tr>';
		
	}
	$lista.="</table>"
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
	<script src="https://kit.fontawesome.com/de9cdb50bb.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Panel Admin</title>

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
	  	.ee{
	  		background-color: var(--color-secondary);
		    border: 5px solid var(--color-dark);
	  	}

	  	a{
	  		text-decoration: none;
	  		color: black;
	  	}

	  
	</style>
</head>



<body>
	<nav>
	    <div class="nav-wrapper  teal darken-4">
	      	<a href="#" class="brand-logo center">¡Bienvenido Administrador!</a>
	    </div>
  	</nav>
  	<br>
  	<br>
  	<br>

  	<content >
  		<a href="logout.php">
	  		<di class="row ">
		      	<div class="card col s10 m6 l6 offset-s1 offset-m3 offset-l3 hoverable ee">
		        	<div class="flow-text center">
	            		<p><b>¡Cerrar sesión de Administrador!</b></p> 
	        		</div>
		      	</div>
	      	</di>
      	</a>

  		<div class="row">
	      	<div class="card col s10 m6 l6 offset-s1 offset-m3 offset-l3">
            	<br>
            	<div class="flow-text center" >
            		<p><b>Webs de los usuarios:</b></p> 
        		</div>
				    <div>
						<?php 
							echo $lista;
						?>
				    </div>
                    <br>
                </form>
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
        		WebGenerator © 2022 Copyright Text
        		<a class="grey-text text-lighten-4 right" href="#!">A.L.B</a>
        	</div>
      	</div>
    </footer>


	 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>	
</body>
</html>