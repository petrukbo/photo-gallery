<?php

class User
{
    public $data;

    public function __construct()
    {
        $this->data = new mysqli('localhost','root','','gallery');
        if (mysqli_connect_errno())	exit();
    }

    public function registration($login,$password,$email,$name,$country)
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

    public function login($login,$password)
    {
        $sql1="SELECT id FROM user WHERE login = '$login' AND password = '$password'";
        $result = mysqli_query($this->data,$sql1);
        $usdata = mysqli_fetch_array($result);
        $count_rows = $result->num_rows;
        if ($count_rows == 1)
        {
            $_SESSION['id']=$usdata['id'];
            return true;
        } else return false;
    }

    public function getLogin($uid)
    {
        $glog="SELECT login FROM user WHERE id = '$uid'";
        $result = mysqli_query($this->data,$glog);
        $usdata = mysqli_fetch_array($result);
        return $usdata['login'];
    }

    public function getPassword($uid)
    {
        $gpass="SELECT password FROM user WHERE id = '$uid'";
        $result = mysqli_query($this->data,$gpass);
        $usdata = mysqli_fetch_array($result);
        return $usdata['password'];
    }

    public function getName($uid)
    {
        $gname="SELECT name FROM user WHERE id = '$uid'";
        $result = mysqli_query($this->data,$gname);
        $usdata = mysqli_fetch_array($result);
        return $usdata['name'];
    }

    public function getEmail($uid)
    {
        $gem="SELECT email FROM user WHERE id = '$uid'";
        $result = mysqli_query($this->data,$gem);
        $usdata = mysqli_fetch_array($result);
        return $usdata['email'];
    }

    public function getCountry($uid)
    {
        $gcou="SELECT country FROM user WHERE id = '$uid'";
        $result = mysqli_query($this->data,$gcou);
        $usdata = mysqli_fetch_array($result);
        return $usdata['country'];
    }

    public function update_data($l,$p,$e,$n,$c,$uid)
    {
        $sql="UPDATE user SET login = '$l', password='$p', email='$e', name = '$n', country='$c' WHERE id = '$uid'";
        mysqli_query($this->data,$sql);
    }

    public function delete_data($uid)
    {
        $sql="DELETE FROM user WHERE id='$uid'";
        mysqli_query($this->data,$sql);
    }

    public function count_users()
    {
        $sql="SELECT * FROM user";
        $check = $this->data->query($sql);
        $count_row=$check->num_rows;
        return $count_row;
    }

    public function add_photo($image,$id_user)
    {
        $image = "img/".$_FILES["image"]["name"];
        $sql1="INSERT INTO picture SET path='$image', id_creator='$id_user'";
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
        $result = mysqli_query($this->data,$sql1);
        return $result;
    }

    public function get_picture($uid)
    {
        $arr = array();
        $data = $this->data;
        $data->query( "SET NAMES UTF8" );
        $statement = $data->prepare("SELECT path FROM picture WHERE id_creator = '$uid'");
        $statement->execute();
        $statement->bind_result($path);
        while ($statement->fetch()){
            $line = new stdClass;
            $line->path = $path;

            $arr[] = $line;
        }
        $statement->close();
        return $arr;
    }
}

?>