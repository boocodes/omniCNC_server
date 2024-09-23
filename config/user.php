<?php
class User{
    private $conn; // connection data
    private $table_name = "omnicnc"; // table name in db
    private $login; // user login
    private $password; // user passwrd
    private $email; // user email 
    private $created; // created at
    private $updated; // updated at 
    private $logotype_src; // logotype for beauty
    private $organisation; // organisation name or etc
    private $about; // about user text 
    private $achievements; // achviements list
    private $workspace_id; // workspace id for 
    // connect
    public function set_connection($db)
    {
        $this->conn = $db;
    }
    // getter
    public function get_connection ()
    {
        return $this->conn;
    }
    public function get_login()
    {
        return $this->login;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_created()
    {
        return $this->created;
    }
    public function get_updated()
    {
        return $this->updated;
    }
    public function get_logotype_src()
    {
        return $this->logotype_src;
    }
    public function get_organisation()
    {
        return $this->organisation;
    }
    public function get_about()
    {
        return $this->about;
    }
    public function get_achievments()
    {
        return $this->achievments;
    }
    public function get_workspace_id()
    {
        return $this->workspace_id;
    }
    // setter
    public function set_login($login)
    {
        $this->login = $login;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_updated($updated)
    {
        $this->updated = $updated;
    }
    public function set_logotype_src($logotype_src)
    {
        $this->logotype_src = $logotype_src;
    }
    public function set_organisation($organisation)
    {
        $this->organisation = $organisation;
    }
    public function set_about($about)
    {
        $this->about = $about;
    }
    public function achievments($achievements)
    {
        $this->achievments = $achievements;
    }

    // workers
    public function check_fields_by_empty()
    {
        if(!empty($this->login) 
        && !empty($this->email)
        && !empty($this->password)
        && !empty($this->email)
        )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function login_user_by_login()
    {
        $query = "SELECT * FROM `".$this->table_name."` WHERE login='".$this->login."' AND password='".$this->password."';";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
    public function login_user_by_email()
    {
        $query = "SELECT * FROM `".$this->table_name."` WHERE email='".$this->email."' AND password='".$this->password."';";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if($row)
        {
            return $row;
        }
        else
        {
            return false;
        }
    }
}