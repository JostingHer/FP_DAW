<?php
class Stockceromenor extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = "<p>El stock no puede ser cero o negativo</p>";
    return $errorMsg;
  }
}

class Precioceromenor extends Exception {
    public function errorMessage() {
      //error message
      $errorMsg = "<p>El precio no puede ser cero o negativo</p>";
      return $errorMsg;
    }
  }

  class Productonoencontrado extends Exception {
    public function errorMessage() {
      //error message
      $errorMsg = "<p>El producto no existe</p>";
      return $errorMsg;
    }
  }
  
?>


  
