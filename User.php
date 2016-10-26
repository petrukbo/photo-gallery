<?php

class User
{
    public $data;

    public function __construct()
    {
        $this->data = new mysqli('localhost','root','','gallery');
        if (mysqli_connect_errno())	exit();
    }

        public function registration($login,$password,$email,$name,$country,$pic)
    {
        $sql="SELECT * FROM user WHERE login = '$login'";
        $check = $this->data->query($sql);
        $count_row=$check->num_rows;

        if ($count_row==0)
        {
            $sql1="INSERT INTO user SET login = '$login', password = '$password', email = '$email', name = '$name', country = '$country'";
            $result = mysqli_query($this->data, $sql1) or die (mysqli_connect_errno()."Данные не записаны");
            return $result;
        }
        else return false;
    }
}

?>