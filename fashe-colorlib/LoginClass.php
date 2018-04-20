<?php
class LoginClass{
	private $name;
	private $check;

    public function _construct(){
        $this->name = "NOT_LOGIN";
        $this->check = FALSE;
    }
	public function setName($name){
        $this->name = $name;
		$check = true;
	}
	public function status_Login(){
		return $this->check;
	}
	public function logout(){
		$this->name = "NOT_LOGIN";
		$this->check = false;
	}
	public function getName(){
		return $this->name;
	}
}
?>