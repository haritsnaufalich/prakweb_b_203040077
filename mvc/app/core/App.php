<?php

class App {
  public function __construct() {
    $url = $this->parseUrl();
    var_dump($url);
  }

  public function parseUrl() {
    if (isset($_GET['url'])) {
      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }
}