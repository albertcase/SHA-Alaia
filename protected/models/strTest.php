<?php

class strTest{
  public static function email($key){
    return self::reg($key ,"/^[0-9a-zA-Z._-]+@[0-9a-zA-Z]+(\.[0-9a-zA-Z]+){0,1}$/");
  }

  public static function number($key){
    return self::reg($key ,"/^-.[0-9]+$/");
  }

  public static function telphone($key){
    return self::reg($key ,"/^(\+.[0-9]{1,5}+[\s-]{0,1}){0,1}[0-9]+/");
  }

  public static function reg($key ,$reg){
    return preg_match($reg ,trim($key));
  }
}
