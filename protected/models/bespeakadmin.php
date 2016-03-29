<?php

class bespeakadmin
{
  private $sql;
  private $request;

  public function __construct(){
    $this->sql = new database();
    $this->request = new uprequest();
  }

  public function getpage(){
    $data = array(
      array('key' => 'name' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'surname' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'title' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'telphone' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'email' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'storeid' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'callway' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'sguide' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'status' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'numb' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'one' ,'type'=> 'post' ,'regtype'=> 'text'),
    );
    if(!$keys = $this->request->uselykeys($data))
      return '11'; /*data formate error*/
    if(!is_array($keys))
        $keys = array();
    $numb = isset($keys['numb'])?$keys['numb']:'1';
    $one = isset($keys['one'])?$keys['one']:'10';
    unset($keys['numb']);
    unset($keys['one']);
    return $this->sql->Reggetpage($numb ,$one ,$keys ,array(),'alaia_bespeak' );
  }

  public function comfirmbespk(){
    $data = array(
      array('key' => 'id' ,'type'=> 'post' ,'regtype'=> 'number'),
    );
    if(!$keys = $this->request->comfirmKeys($data))
      return '11'; /*data formate error*/
    if($this->sql->Sqlupdate('alaia_bespeak',array('status'=>'1' ,'endtime'=> date('Y-m-d H:i:s' ,strtotime("now"))),'id=:id',array(':id' => $keys['id']))){
      return '12'; /*data instart success*/
    }
    return '13';/*data insert error*/
  }

  public function getcount(){
    $data = array(
      array('key' => 'name' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'surname' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'title' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'telphone' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'email' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'storeid' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'callway' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'sguide' ,'type'=> 'post' ,'regtype'=> 'text'),
      array('key' => 'status' ,'type'=> 'post' ,'regtype'=> 'text'),
    );
    if(!$keys = $this->request->uselykeys($data))
      return '11'; /*data formate error*/
    if(!is_array($keys))
      $keys = array();
    return array('count' => $this->sql->Reggetcount('alaia_bespeak',$keys));
  }
}
