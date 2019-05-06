<?php 
  class User {
    private $id;
    private $user;
    private $role;
    

    public function getUser() {
      return $this->user;
    }
    public function getRole() {
      return $this->role;
    }
    public function getId() {
      return $this->id;
    }
    public function setUser($user) {
      $this->user = $user;
    }
    public function setRole($role) {
      $this->role = $role;
    }
    public function setId($id) {
      $this->id = $id;
    }

    public function create() {
      $str = file_get_contents('../../data.json');
      $user = array(
        "id" =>  $this->getId(),
        "user" => $this->getUser(),
        "role" => $this->getRole()
      );
      if($this->getUser() == null)
        return false;

      $data = json_decode($str, true);
      array_push($data, $user);

      $str = json_encode($data, JSON_PRETTY_PRINT);

      if(file_put_contents('../../data.json', $str)){
        return true;
      } else {
        return false;
      }
    }
    public function read() {
      $str = file_get_contents('../../data.json');
      $json = json_decode($str, true);
      return $json;
    }
    
    public function update() {
      $str = file_get_contents('../../data.json');
      $data = json_decode($str);
      $flag = false;
      foreach ($data as $key => $value) {
        if($this->getId() == $value->id){
          $value->user = $this->getUser();
          $value->role = $this->getRole();
          $flag = true;
        }
      }
      if(!$flag) {
        return false;
      }
      $str = json_encode($data, JSON_PRETTY_PRINT);
      if(file_put_contents('../../data.json', $str)){
        return true;
      } else {
        return false;
      }
    }
    
    public function delete() {
      $str = file_get_contents('../../data.json');
      $data = json_decode($str);
      $flag = false;
      foreach ($data as $key => $value) {
        foreach ($data[$key] as $k => $v) {
          if($k == 'id' && $v == $this->getId()){
            unset($data[$key]);
            $flag = true;
          }
        }
      }
      $data = array_values($data);
      if(!$flag) {
        return false;
      }
      $str = json_encode($data);
      if(file_put_contents('../../data.json', $str)){
        return true;
      } else {
        return false;
      }

    }
  }
