<?php

class bespeakApi
{
  public function addbespeak(){
    $sql = new database();
    $request = new uprequest();
    $data = array(
      array('key' => 'name' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'surname' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'title' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'telphone' ,'type'=> 'post' ,'regtype'=> 'telphone'),
      array('key' => 'email' ,'type'=> 'post' ,'regtype'=> 'email'),
      array('key' => 'country' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'storeid' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'callway' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'sguide' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'bespeaktime' ,'type'=> 'post' ,'regtype'=> 'text'),
    );
    if(!$keys = $request->comfirmKeys($data))
      return '11'; /*data formate error*/
    if($result = $sql->insertData($keys ,'alaia_bespeak'))
      return '12'; /*data instart success*/
    return '13';/*data insert error*/
  }
}
