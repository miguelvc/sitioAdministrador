<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\Services;
/**
 * Description of Helpers
 *
 * @author onajphi
 */
class Helpers {
    public $jwtAuth;
    
    public function __construct($jwtAuth) {
        $this->jwtAuth=$jwtAuth;
     }
     
     public function authCheck($hash,$getIdentity=false){
         $jwtAuth= $this->jwtAuth;
         
         $auth=false;
         if($hash!=null){
             if($getIdentity==false){
                $checkToken=$jwtAuth->checkToken($hash);
                if($checkToken==true){
                   $auth=true; 
                }
             }else{
                 $checkToken=$jwtAuth->checkToken($hash);
                if($checkToken==true){
                   $auth=true; 
                }
             }
         }
         
         return $auth;
     }

     public function jsonSerializer ($data){
        $normalizers= array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer());
        $encoders=array("json" => new \Symfony\Component\Serializer\Encoder\JsonEncode());
        
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers,$encoders);
        $json=$serializer->serialize($data, 'json');
        
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type","application/json");
        
        return $response;
    }
}
