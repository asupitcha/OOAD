<?php
class UserClass{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $date;
    private $phone_number;
    private $address;

    public function _construct(){
        $id = "";
        $first_name = "asdgn";
        $last_name = "";
        $email = "";
        $address = "";
        $phone_number = 0;
    }
    public function setUserID($uid){
        $this->$id = $uid;
    }
    public function getUserID(){
        return $this->$id;
    }
    public function setFirstName($name){
        $this->first_name = $name;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function setLastName($last){
        $this->last_name = $last;
    }
    public function getLastName(){
        return $this->last_name;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getDate(){
        return $this->date;
    }
    public function setPhoneNumber($number){
        $this->phone_number = $number;
    }
    public function getPhoneNumber(){
        return $this->phone_number;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }
}
?>
