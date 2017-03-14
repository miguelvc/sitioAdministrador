<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Services;

use Firebase\JWT\JWT;
/**
 * Description of JwtAuth
 *
 * @author onajphi
 */
class JwtAuth {
public $manager;
public $key;
//put your code here
public function __construct($manager) {
$this->manager = $manager;
$this->key = "clave-secreta";
}

public function checkToken($jwt, $getIdentity = false){
$key = $this->key;
$auth = false;

try {
$decoded = JWT::decode($jwt, $key, array('HS256'));
} catch (\UnexpectedValueException $e){
   $auth = false; 
    
}catch (\DomainException $e){
   $auth = false; 
}

if(isset($decoded->sub)){
    $auth = true;
}else{
   $auth = false; 
}

if($getIdentity==true){
    return $decoded; 
}else{
    return $auth;
}

}

public function signUp($email, $password, $getHash = null){
$key = $this->key;

$pwd = hash('sha256', $password);

                
$user = $this->manager->getRepository('BackendBundle:Usuario')->findOneBy(
array("email" => $email,
 "password" => $pwd)
);
if(is_object($user)){
$signUp = true;
}else{
$signUp = false;
}
if ($signUp == true){
$token = array("sub" => $user->getUsuarioId(),
 "email" => $user->getEmail(),
 "nombre" => $user->getNombre(),
 "password" => $user->getPassword(),
 "iat" => time(),
 "exp" => time()+(7*24*60*60));
$jwt = JWT::encode($token, $key, 'HS256');
$decoded = JWT::decode($jwt, $key, array('HS256'));

if($getHash != null){
return $jwt;
}else{
return $decoded;
}


}else{
return array("status" => "error", "data" => "Login failed!!");
}

}
}
