<?php

namespace Http\Forms;

use Core\ValidationExpection;
use Core\Validator;

class LoginForm
{
    protected $error = [];

    public function __construct(public array$attribute)
    {
        if (!Validator::email($attribute['email'])) {
            $this->error['email'] = "The email should be your valid email address";
        }

        if (!Validator::string($attribute['password'], 7, 255)) {
            $this->error['password'] = 'Provide a valid password';
        }
    }

    public static function validate($attribute)
    {
        $instance = new static($attribute);

        return $instance->failed() ? $instance->throw() : $instance ;
        
    }


    public function throw(){
        ValidationExpection::throw($this->getError(), $this->attribute);
    }

    public function failed()
    {
        
        return count($this->error);
    }

    
    public function setError($key, $value){
        $this->error[$key]= $value;

        return $this;
    }

    public function getError(){
        return $this->error;
        
    }

    


}
