<?php

class User{
 
    private $id;
    private $user;
    private $role;

    public function getId()
    {
        return $this->id;
    }
    
    public function getUser()
    {
        return $this->user;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function create(){
        $data = file_get_contents('data.json');

        $json = json_decode($data, true);

        $json[] = array('id'=>$this->getId(), 'user'=>$this->getUser(), 'role'=>$this->getRole()); 

        if(file_put_contents('data.json', json_encode($json))){
            return true;
        }else{
            return false;
        }
    }
    public function read(){
        $data = file_get_contents('data.json');

        $json = json_decode($data, true);
        return $json;
    }
    public function update(){
        $data = file_get_contents('data.json');

        $json = json_decode($data, true);
        
        foreach ($json as $key => $value) {
            # code...
            if ($this->getId() == $value['id']) {
                # code...
                $json[$key]['role'] = $this->getRole();
                $json[$key]['user'] = $this->getUser();
            }
        }
        
        if(file_put_contents('data.json', json_encode($json))){
            return true;
        }else{
            return false;
        }
    }
    public function delete(){
        $data = file_get_contents('data.json');

        $json = json_decode($data, true);
        
        
        $arry_json = array();
        
        foreach ($json as $key => $value) {
            # code...
        
            if ($this->getId() == $value['id']) {
                # code...
                $arry_json[] = $key;
            }
        }
        foreach ($arry_json as $key) {
            # code...
            unset($json[$key]);
        }
        $json = array_values($json);
        if(file_put_contents('data.json', json_encode($json))){
            return true;
        }else{
            return false;
        }
    }
}

?>