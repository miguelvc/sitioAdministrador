<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    
    public function pruebasAction(Request $request)
    {
        $helpers = $this->get("app.helpers");
         
        // replace this example code with whatever you need
        //$em=$this->getDoctrine()->getManager();
        //$usuarios =$em->getRepository('BackendBundle:Usuario')->findAll();
    
         $hash= $request->get("authorization",null);
         
         $check=$helpers->authCheck($hash,true);
         
         var_dump($check);
         die();
        //return $helpers->jsonSerializer($usuarios);
       
    }
    
     public function loginAction(Request $request)
    {
         $helpers = $this->get("app.helpers");
         $jwtAuth = $this->get("app.jwt_auth");
         
         $json=$request->get("json",null);
         
         
         if($json != null){
           $params= json_decode($json);
           $email = (isset($params->email))?$params->email : null;
           $password = (isset($params->password))?$params->password: null;
           $getHash = (isset($params->getHash))?$params->getHash: null;
           
           $emailContraint = new Assert\Email();
           $emailContraint->message = "This email is not valid !! ";
           
           $validateEmail = $this->get("validator")->validate($email,$emailContraint);
           
           if(count($validateEmail)==0 && $password != null){
               if ($getHash==null){
                 $signup=$jwtAuth->signUp($email,$password);  
               }else{
                   $signup=$jwtAuth->signUp($email,$password,true);
               }
               
               return new JsonResponse($signup);
           }else{
               return $helpers->jsonSerializer(array("status"=>"error","data"=>"Login not valid !!"));
           }
        
         }else{
            return $helpers->jsonSerializer(array("status"=>"error","data"=>"Send Json in POST !!")); 
         }
       
       
       
       die();
    }
    
   
}
