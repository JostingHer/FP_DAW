<?php

class App
{


  public function run2()
  {
    if (isset($_GET['method'])) {
      $method = $_GET['method'];
    } else {
      $method = 'login';
    }
    $this->$method();
  }

  public function home()
  {
    
    include("views/home.php");
 
  }

  public function login()
  {
   
    include("views/login.php");
  } 
  
  public function auth()
  {

    if (isset($_POST['name']) && isset($_POST['password']) ) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    setcookie("name",$name,time()+ 3600*24);
    setcookie("password",$password,time() + 3600*24);

    header("Location: ?method=home");

  }

  }  

  public function logout()
  {
    setcookie("name","",time()+ -1);
    setcookie("password","",time() -1);

    header("Location: ?method=login");
  }  
}