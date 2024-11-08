<?php

class App
{

    public $name;
    public $student;
    public $module;
    public $teacher;

  public function __construct($name = "Aplicación PHP")
  {
    echo "Construyendo la app <hr>";
    $this->name = $name;
    $this->module = "Desarrollo Web en Entorno Servidor";
    $this->teacher = "Israel Gimeno";
    $this->student = "Fulano De Tal";
  }

  public function run()
  {
    echo "Moneda al aire... <hr>";
    $moneda = rand(0,1);
    if ($moneda) {
      echo "<h3>Ha salido cara:  </h3> <br>";
      $this->index();
    } else {
      echo "<h3> Ha salido cruz: </h3> <br>";
      $this->login();
    }
    
  }

  public function run2()
  {
    if (isset($_GET['method'])) {
      $method = $_GET['method'];
    } else {
      $method = 'index';
    }
    $this->$method();
  }

  public function index()
  {
    echo "Estamos en el index<br>";
    include("views/index.php");
    /*echo "Estos es $this->name<br>";
    echo "Me llamo $this->student<br>";
    echo "Estamos estudiando $this->module con el profesor $this->teacher<br>";*/
  }

  public function login()
  {
    echo "Ahora podría mostrar un formulario de login <br>";
    include("views/form.php");
  }  
}