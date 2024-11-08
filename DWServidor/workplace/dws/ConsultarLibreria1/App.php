<?php

class App
{


  public function run2()
  {
    if (isset($_GET['method'])) {
      $method = $_GET['method'];
    } else {
      $method = 'home';
    }
    $this->$method();
  }

  public function home()
  {
    
    include("views/home.php");
 
  }

  public function consulta1()
  {
   
    include("views/consulta1.php");
  } 



  public function consulta4()
  {
   
    include("views/consulta4.php");
  } 
  
  

}