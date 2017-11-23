<?php
namespace App\Models;
class User
{
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $cart;
	public static $number_of_users = 0;

    function __construct(){
		User::$number_of_users++;
    }
    
    function setFirstName($firstname){
        $this->first_name = trim($firstname);  
    }

    function getFirstName(){
        return $this->first_name;  
    }

    function setLastName($lastname){
        $this->last_name = trim($lastname);  
    }

    function getLastName(){
        return $this->last_name;
    }

    function getFullName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getEmail(){
        return $this->email;  
    }

    function getEmailVariables(){
        return [
            'full_name' => $this->getFullName(),
            'email' => $this->getEmail()
        ];
    }

    function __set($nm,$value){
		echo "..............>>USER>>.......................<br/>";
		echo " Set " . $nm .  " to " . $value . "<br/>";
	}
}
?>