<?php 
// require_once('../model/DBcontroller.php');

class Session
    {
   function init(){
      session_start();
    }

     function set($key,$value){
        $_SESSION[$key] = $value;
    }

     function get($key){
       if (isset($_SESSION[$key])){
        $result = $_SESSION[$key];
    }

    if (isset($result)) {
        return $result;
    }else{
      return false;
     }
    }

     function checkSession(){
       $this->init();
       if($this->get("login") == false){
        $this->destroy();
      //  header("Location:/HospitalDonation/view/loginSystem/userlog.php");
      }
    }

     function checkLogin(){
      $this-> init();
       if($this->get("login") == true){
       header("Location:/HospitalDonation/view/donorManagement/donor_add.php");
      }
    }

     function destroy(){
       session_destroy();
    //   header("Location:../../view/loginSystem/userlog.php");
     }
    }
    
    ?>