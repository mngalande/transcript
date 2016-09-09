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

        $result = conn::db()->query("SELECT * FROM transcript.tblUsers")->fetchAll();
        if($result){
            $users = array();
            foreach($result as $row)
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
        $sql = conn::db()->prepare("SELECT FirstName FROM transcript.tblUsers WHERE UserName = :username");
        if($sql->execute(array('username' => $username))){
            return $sql->fetchColumn();
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
        $sql = conn::db()->prepare("SELECT Surname FROM transcript.tblUsers WHERE UserName = :username");
        if($sql->execute(array('username' => $username))){
            return $sql->fetchColumn();
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
        $sql = conn::db()->prepare("SELECT UserType FROM transcript.tblUsers WHERE UserName = :username");
        if($sql->execute(array('username' => $username))){
            return $sql->fetchColumn();
        }
        else{
            return false;
        }
    }    

     /**
     * get username of a user.
     *Response: username
     *
     */
    public function getUserName(){

        $username = $this->username;
        $sql = conn::db()->prepare("SELECT UserName FROM transcript.tblUsers WHERE UserName = :username");
        if($sql->execute(array('username' => $username))){
            return $sql->fetchColumn();
        }
        else{
            return false;
        }
    }  


    /**
     * Store a newly created user in storage.
     * @param  string  $firstname, $surname, $username, $password $usertype
     *  @return Response:number of rows inserted
     */
    public function createUser($firstname, $surname, $username, $usertype, $password)
    {
        $password = md5($password);
        $sql = conn::db()->prepare("INSERT INTO transcript.tblUsers  (FirstName, Surname, UserName, UserType, Password) VALUES(:firstname, :surname, :username, :usertype, :password)");
        if($sql->execute(array('firstname'=>$firstname, 'surname' => $surname, 'username' => $username, 'usertype' => $usertype, 'password' => $password))){
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
     * @return Response: number of rows updated
     */
    public function updateUser($firstname, $surname, $username, $oldusername, $usertype){
        $sql = conn::db()->prepare("UPDATE transcript.tblUsers SET FirstName = :firstname, Surname = :surname, UserName = :username, UserType = :usertype WHERE username = :oldusername");
        if($sql->execute(array('firstname' => $firstname, 'surname' => $surname, 'username' => $username, 'usertype' => $usertype, 'oldusername' => $oldusername))){
            $user = new User($_SESSION['username']);
    
            if($user->getUserName() == $oldusername){
                $_SESSION['usertype'] = $usertype;
            }
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
        $sql = conn::db()->prepare("DELETE FROM transcript.tblUsers where UserName = :username");
        if($sql->execute(array('username' => $username))){
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
        $sql = conn::db()->prepare("SELECT COUNT(*) FROM transcript.tblUsers where UserName = :username");
        $sql->execute(array('username' => $username));
        $result = $sql->fetchColumn();
        if($result){
            return false;
        }
        else{
            return true;
        }
    }

    static function login($username, $password){
        $sql = conn::db()->prepare("SELECT UserName, Password, UserType FROM transcript.tblUsers WHERE UserName = :username AND Password = :password");
        $sql->execute(array('username' => $username, 'password' => $password));
        $result = $sql->fetch();
        if($result){
            $username = $result['UserName'];
            $usertype = $result['UserType'];   
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
        $sql = conn::db()->prepare("SELECT COUNT(*) FROM transcript.tblUsers where UserName = :username");
        $sql->execute(array('username' => $username));
        $result = $sql->fetchColumn();
        if($result == 1){
            return true;
        }
        else{
            return false;
        }
    }

}

