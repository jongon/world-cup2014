<?php

 App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');
 
class CustomPasswordHasher extends AbstractPasswordHasher {
    
    public function hash($password) {
        return $password;
    }
    
    public function check($password, $hashedPassword) {
        return $password === $this->hash($hashedPassword);
    }
}

?>