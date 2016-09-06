<?php
//require "../common/access.php";
class User{

    private $username;

    //constructor
    public function user($username=false){

        $this->username = $username;
    }


    /**
     * get all system users.
     *
     */
    static function getUsers(){

        $result = mysql_query("SELECT * FROM transcript.tblUsers;");
        if(mysql_num_rows($result)>0){

            $users = array();
            while($row = mysql_fetch_assoc($result))
            {
                    array_push($users, $row['UserName']);
            }
            return $users;
        }
        else{

            return false;
        }
    }

    /**
     * get firstname of a user.
     *
     */
    public function getFirstName(){

        $username = $this->username;
        $result = mysql_query("SELECT FirstName FROM transcript.tblUsers WHERE UserName = '$username';");
        if(mysql_num_rows($result) == 1){

            $row = mysql_fetch_assoc($result);
            return $row['FirstName'];

        }
        else{
            return false;
        }
    }    


    /**
     * get surname of a user.
     *
     */
    public function getSurname(){

        $username = $this->username;
        $result = mysql_query("SELECT Surname FROM transcript.tblUsers WHERE UserName = '$username';");
        if(mysql_num_rows($result) == 1){

            $row = mysql_fetch_assoc($result);
            return $row['Surname'];

        }
        else{
            return false;
        }
    }    

    /**
     * get usertype of a user.
     *
     */
    public function getUserType(){

        $username = $this->username;
        $result = mysql_query("SELECT UserType FROM transcript.tblUsers WHERE UserName = '$username';");
        if(mysql_num_rows($result)>0){

            $row = mysql_fetch_assoc($result);
            return $row['UserType'];

        }
        else{
            return false;
        }
    }    


    /**
     * Store a newly created user in storage.
     * @param  string  $firstname, $surname, $username, $password $usertype
     *  @return Response
     */
    public function createUser($firstname, $surname, $username, $usertype, $password)
    {
        $password = md5($password);
        if(mysql_query("INSERT INTO transcript.tblUsers  (FirstName, Surname, UserName, UserType, Password) VALUES('$firstname', '$surname', '$username', '$usertype', '$password');")){
                return true;
        }
        else{
            return false;
        }
    }

    /**
     * Update the specified user in storage.
     *
     * @param  string  $firstname, $surname, $username, $usertype
     * @return Response
     */
    public function updateUser($firstname, $surname, $username, $oldusername, $usertype){
        if(mysql_query("UPDATE transcript.tblUsers SET FirstName = '$firstname', Surname = '$surname', UserName = '$username', UserType = '$usertype' WHERE username = '$oldusername';")){
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * Remove the specified user from storage.
     *
     * @return Response
     */
    public function deleteUser()
    {
        $username = $this->username;
        if(mysql_query("DELETE FROM transcript.tblUsers where UserName = '$username';")){
                return true;
        }
        else{
                return false;
        }
    }

     /**
     * Check if username is not already taken
     *
     *struing $username
     * @return Response
     */
    static function usernameIsAvailable($username)
    {
        $result = mysql_query("SELECT UserName FROM transcript.tblUsers where UserName = '$username';");
        if(mysql_num_rows($result)){
            return false;
        }
        else{
            return true;
        }
    }

    static function login($username, $password){
        $password = $password;
        $result = mysql_query("SELECT * FROM transcript.tblUsers WHERE UserName = '$username' AND Password = '$password';");
        if(mysql_num_rows($result) == 1){
            $row = mysql_fetch_assoc($result);
            $username = $row['UserName'];
            $usertype = $row['UserType'];   
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;
            return true;
        }
        else{
            return false;
        }
    }


     /**
     * Check if user exists
     *
     *struing $username
     * @return Response
     */
    static function userExists($username)
    {
        $result = mysql_query("SELECT UserName FROM transcript.tblUsers where UserName = '$username';");
        if(mysql_num_rows($result)){
            return true;
        }
        else{
            return false;
        }
    }

}

