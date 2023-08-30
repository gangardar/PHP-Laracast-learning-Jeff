<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $error = [];

    public function validate($email, $password)
    {

        if (!Validator::email($email)) {
            $this->error['email'] = "The email should be your valid email address";
        }

        if (!Validator::string($password, 7, 255)) {
            $this->error['password'] = 'Provide a valid password';
        }

        return empty($this->error);
    }
    
    public function setError($key, $value){
        $this->error[$key]= $value;
    }

    public function getError(){
        return $this->error;
        
    }

    


}
