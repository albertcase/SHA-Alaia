<?php

class uprequest
{
  public function get($key ,$val=''){
    return trim($_GET[$key]?$_GET[$key]:$val);
  }

  public function post($key ,$val=''){
    return trim($_POST[$key]?$_POST[$key]:$val);
  }

  public function comfirmKeys($keys){ /*array(array('key' => key ,'type'=> post/get ,'regtype'=> regtype ,$selfReg => '') )*/
    $out = array();
    $k = '';
    foreach($keys as $x){
      $k = $this->$x['type']($x['key']);
      if($x['regtype'] != 'text'){
          if(!$this->$x['regtype']($k))
            return false;
      }
      $out = $out + array($x['key'] => $k);
      unset($k);
    }
    return $out;
  }

  public function text($key){
    return $key;
  }

}
