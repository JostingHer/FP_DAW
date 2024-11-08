<?php

require_once "App.php";

try {
    $app = new App;
  $app->run2(); 
  } catch(Stockceromenor $e) {
    echo $e->errorMessage();
  } catch(Precioceromenor $b) {
    echo $b->errorMessage();
  } catch(Productonoencontrado $c) {
    echo $c->errorMessage();
  } finally {
    //código que se ejecuta siempre,
    //haya o no excepción
  }