<?php
namespace App\Libraries;
class Hash
{
    public static function make($input)
    {
    	return password_hash($input, PASSWORD_BCRYPT);
        
    }
  public static function check($input, $db_password)
    {
    	if (password_verify($input, $db_password)) {
    		return true;
    	}else{
    		return false;
    	}
        
    }
    public static function generatePassword()
    {
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }


}



// Cara menggunakan class 
// echo Hash::make('12345');
// echo Hash::check('12345', '12345');