<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\Usuario;

class UsuarioController extends Controller
{
    //hola hola
    public function newAction(Request $request){
        
        $helpers = $this->get("app.helpers");
            
        
        $json= $request->get("json",null);
        $params=json_decode($json);
        $data=array();
        if($json != null){
            $fecha = new \DateTime("now");
            $email =(isset($params->email))?$params->email:null;
            $nombre =(isset($params->nombre))?$params->nombre:null;
            $password =(isset($params->password))?$params->password:null;
            $vigente=true;
            $eliminado=false;
            
           $emailContraint = new Assert\Email();
           $emailContraint->message = "This email is not valid !! ";   
           $validateEmail = $this->get("validator")->validate($email,$emailContraint);
           
           if($email !=null && count($validateEmail)==0 && $password != null 
                   && $nombre != null){
               $usuario= new Usuario();
               $usuario->setEliminado($eliminado);
               $usuario->setEmail($email);
               $usuario->setFecha($fecha);
               $usuario->setNombre($nombre);
               $usuario->setPassword($password);
               $usuario->setVigente($vigente);
               
               $pwd = hash('sha256',$password);
               $usuario->setPassword($pwd);
               
               $em = $this->getDoctrine()->getManager();
               $issetUser=$em->getRepository("BackendBundle:Usuario")->findBy(
                       array(
                           "email"=>$email
                       ));
                if(count($issetUser)==0){
                    $em->persist($usuario);
                    $em->flush();
                    $data["status"] = 'success';
                    $data["code"] = 200;
                    $data["msg"] = 'New user created !!';
                }  else{
                    $data = array(
                "status"=>"error",
                "code"=>401,
                "msg"=>"User not created, duplicated"
            );
                } 
               
                   }else{
                       $data = array(
                "status"=>"error",
                "code"=>402,
                "msg"=>"User not created"
            );
                   }
        }else{
            $data = array(
                "status"=>"error",
                "code"=>403,
                "msg"=>"User not created"
            );
        }
        return $helpers->jsonSerializer($data);
    }
    
     public function editAction(Request $request){
        
        $helpers = $this->get("app.helpers");
           
        $hash= $request->get("authorization",null);
        $authCheck = $helpers->authCheck($hash);
        
        if($authCheck==true){
                  
        
        $json= $request->get("json",null);
        $params=json_decode($json);
        $data=array();
        if($json != null){
            $fecha = new \DateTime("now");
            $email =(isset($params->email))?$params->email:null;
            $nombre =(isset($params->nombre))?$params->nombre:null;
            $password =(isset($params->password))?$params->password:null;
            $vigente=true;
            $eliminado=false;
            
           $emailContraint = new Assert\Email();
           $emailContraint->message = "This email is not valid !! ";   
           $validateEmail = $this->get("validator")->validate($email,$emailContraint);
           
           if($email !=null && count($validateEmail)==0 && $password != null 
                   && $nombre != null){
               $usuario= new Usuario();
               $usuario->setEliminado($eliminado);
               $usuario->setEmail($email);
               $usuario->setFecha($fecha);
               $usuario->setNombre($nombre);
               $usuario->setPassword($password);
               $usuario->setVigente($vigente);
               
               $pwd = hash('sha256',$password);
               $usuario->setPassword($pwd);
               
               $em = $this->getDoctrine()->getManager();
               $issetUser=$em->getRepository("BackendBundle:Usuario")->findBy(
                       array(
                           "email"=>$email
                       ));
                if(count($issetUser)>0){
                    $em->persist($usuario);
                    $em->flush();
                    $data["status"] = 'success';
                    $data["code"] = 200;
                    $data["msg"] = count($issetUser);
                }  else{
                    $data = array(
                "status"=>"error",
                "code"=>401,
                "msg"=>count($issetUser)
            );
                } 
               
                   }else{
                       $data = array(
                "status"=>"error",
                "code"=>402,
                "msg"=>"User not created"
            );
                   }
        }else{
            $data = array(
                "status"=>"error",
                "code"=>403,
                "msg"=>"User not created"
            );
        }
        
        }else{
              $data = array(
                "status"=>"error",
                "code"=>402,
                "msg"=>"Authorization not valid"
            );
        }
        return $helpers->jsonSerializer($data);
    }
   
}
