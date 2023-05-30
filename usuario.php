<?php
include ("bd.php");
$con = make_connection();

class Usuario {
  private $nombre;
  private $apellido;
  private $email;
  private $password;
  private $edad;
  private $genero;

  public $dbname;

  public function __construct($dbname) {
    $this->dbname = $dbname;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getEdad() {
    return $this->edad;
  }

  public function setEdad($edad) {
    $this->edad = $edad;
  }

  public function getGenero() {
    return $this->genero;
  }

  public function setGenero($genero) {
    $this->genero = $genero;
  }

  function registro($usuario, $nombre, $apellido, $email, $password, $edad, $genero) {
    $con = make_connection();
    $query = "INSERT INTO {$usuario->dbname}(nombre, apellido, email, password, edad, genero) VALUES('$nombre', '$apellido', '$email', '$password', '$edad', '$genero')";
    $resultado = $con->query($query);

    if ($resultado) {
        echo '<script> alert("Se ha registrado exitosamente");window.location.href ="http://localhost/Rubrica/inicio.php";</script>';
    } else {
        echo '<script> alert("Error al registrarse. Por favor, intentelo nuevamente")window.location.href ="http://localhost/Rubrica/registro.php";</script>';
    }
  }

  function inicio() {
    $con = make_connection();
    $query = "SELECT * FROM reg WHERE email='" . $this->getEmail() . "' and password='" . $this->getPassword() . "'";
    $result = $con->query($query);

    if (mysqli_num_rows($result) > 0) {
      $_SESSION['usuario'] = $this->getEmail();
      header("Location: http://localhost/Rubrica/codigo.php");
    } else {
      echo '<script> alert("No se encontró usuario registrado con ese correo, por favor regístrese");window.location.href ="http://localhost/Rubrica/registro.php";</script>';
    }
  }
}
?>
