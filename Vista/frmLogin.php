<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../assets/img/logo%20sotran%20circulo%20system.png">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/fontawesome-free-5.15.1/css/all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/login.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../assets/img/fondo%20sotrans.png');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form name="form" autocomplete="off" class="login100-form validate-form">
                    
                    <input type="hidden" name="op">
                    
					<div class="login100-form-avatar">
						<img src="../assets/img/logo sotran circulo system.png" alt="AVATAR">
					

					   
                    </div>

					<div class="wrap-input100 validate-input m-b-10" >
						<input class="input100" type="text" id="txtUsuario" name="txtUsuario" style="text-transform:uppercase;"  placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" >
						<input class="input100" type="password" id="txtClave" name="txtClave" style="text-transform:uppercase;"  placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" onclick="Login('sesionControlador.php',1)">
							Ingresar
						</button> 
					</div>
                    
        <?php 
                if(isset($_GET['mensaje']))
                { 
                    if($_GET['mensaje']==false)
        ?>  
                    <div class="wrap-input100 validate-input m-b-10" >
                    <div id="renzo" style="background: #03070ead; padding: 2px; text-align:center; position:relative; border-radius:10px;">
                        <p style=" color:white;">Usuario y/o contraseña incorrecta</p>
                        <a href="javascript:quitar()" style="position: absolute; right:8px; top: 4px; color:white;" ><i class="fas fa-times-circle"></i></a>
                    </div>
                    </div>
                    <script type="text/javascript">
                        function quitar() {
                            document.getElementById('renzo').style.display = "none";
                        }
                    </script>
        <?php 
                } 
        ?> 
                    
                    
				</form>
			</div>
		</div>
	</div>
		
    
   
    <script src="../Funciones/javascript.js"></script>
    

</body>
   
</html>