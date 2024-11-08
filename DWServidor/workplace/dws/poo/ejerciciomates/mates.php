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
    $this->student = "Fernando";
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
   
    include("views/index.php");
  
  }

  public function factorial()
  {
    
    include("views/factorial.php");
  }  

  public function fibonacci()
  {
   
    include("views/fibonacci.php");
  }  

  public function potencias2()
  {
    
    include("views/potencias2.php");
  }  

  public function primos()
  {
    
    include("views/primos.php");
  }  



  public function funcionfactorial()
  {

    for($a=0;$a<=9;$a++){
    $factorial = 1; 
    for ($i = 1; $i <= $a; $i++){ 
      $factorial = $factorial * $i; 
    } 
    echo $factorial ."<br>";
} 
} 

} 

  