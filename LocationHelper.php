<?php
class LocationHelper{
  public function goToPage(string $page){
    return header("location: $page.php");
  }
}