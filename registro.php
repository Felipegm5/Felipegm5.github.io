
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Formulario de registro</title>
		<link rel="stylesheet" href="http://localhost/Rubrica/style.css">
		<link rel="stylesheet" href="http://localhost/Rubrica/style2.css">
		<link rel="schprtcut icon" href="http://localhost/Rubrica/logo.png" />

	</head>
	<body>
    <nav id="navegacion">
        <a class="opciones" href="http://localhost/Rubrica/index.html">Volver al Inicio</a>

    </nav>

		<main>
		<form class="formulario" action="http://localhost/Rubrica/procesar_registro.php" method="POST" onsubmit="return validarFormulario()">
			<input type="hidden" name="accion" value="registrar">

			<h1>Registro de usuario</h1>
			<div class="username">
				<label for="nombre"></label>
				<input type="text" id="nombre" name="nombre" placeholder="Nombre"/>
				<br>
			</div>
			<div class="username">
				<label for="apellido"></label>
				<input type="text" id="apellido" name="apellido" placeholder="Apellido">
				<br>
			</div>
			<div class="username">
				<label for="email">:</label>
				<input type="email" id="email" name="email" placeholder="Email">
				<br>
			</div>
			<div class="username">
				<label for="password"></label>
				<input type="password" id="password" name="password" placeholder="contraseña">
				<input type="text" id="mostrar-contraseña" style="display: none;">
                <input type="button" value="Mostrar" onclick="mostrarOcultarContraseña();">
				<br>
			</div>
			<div class="username">
				<label for="edad"></label>
				<input type="number" id="edad" name="edad" placeholder="edad">
				<br>
			</div>
			
				<label for="genero"></label>
				<select id="genero" name="genero" >
					<option value="">Seleccione una opción</option>
					<option value="masculino">Masculino</option>
					<option value="femenino">Femenino</option>
					<option value="otro">Otro</option>
				</select>
				<br>
			</div><br><br>
			<input type="submit" value="Registrarse" name="registrarse">
		</div>			
		</form>
		</main>	
	</body>
	<script>
	function mostrarOcultarContraseña() {
    var contraseña = document.getElementById("password");
    var botónMostrar = document.getElementById("botón-mostrar");

    if (contraseña.type === "password") {
        var valorContraseña = contraseña.value;
        contraseña.type = "text";
        contraseña.value = valorContraseña;
        botónMostrar.textContent = "Ocultar Contraseña";
    } else {
        var valorContraseña = contraseña.value;
        contraseña.type = "password";
        contraseña.value = valorContraseña;
        botónMostrar.textContent = "Mostrar Contraseña";
    }
	}
	function validarFormulario() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var edad = document.getElementById("edad").value;
    var genero = document.getElementById("genero").value;

    if (nombre == "" || apellido == "" || email == "" || password == "" || edad == "" || genero == "") {
        alert("Por favor complete todos los campos.");
        return false;
    }

    if (password.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres.");
        return false;
    }

    var caracterEspecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if (!caracterEspecial.test(password)) {
        alert("La contraseña debe contener al menos un carácter especial.");
        return false;
    }

    var mayuscula = /[A-Z]/;
    if (!mayuscula.test(password)) {
        alert("La contraseña debe contener al menos una letra mayúscula.");
        return false;
    }

    var numero = /[0-9]/;
    if (!numero.test(password)) {
        alert("La contraseña debe contener al menos un número.");
        return false;
    }

    var minuscula = /[a-z]/;
    if (!minuscula.test(password)) {
        alert("La contraseña debe contener al menos una letra minúscula.");
        return false;
    }

	if (email.indexOf("@") !== -1) {
        var caracter = email.split("@")[1];
        if (caracter.length <= 5) {
            alert("Falta caracteres despues del @");
            return false;
        }

    return true;
	}
	}
	</script>
	</html>

