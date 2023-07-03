<?php 

namespace App\Models;

class StaffsModel extends Model {
    protected $id;
    protected $lastname;
    protected $firstname;
    protected $otherfirstname;
    protected $dateofbirth;
    protected $placeofbirth;
    protected $sex;
    protected $address;
    protected $email;
    protected $phone;
    protected $function;
    protected $role;
    protected $staffnum;
    protected $username;
    protected $profil;
    protected $password;
    protected $staffevaluation;
    protected $table = 'staffs';

    
    public  function findByStaff(int $id) {
        return $this->requete("SELECT * FROM $this->table WHERE id = $id")->fetch();
    }

    public  function findByStaffNum(string $staffnum) {
        return $this->requete("SELECT * FROM $this->table WHERE staffnum = $staffnum")->fetch();
    }

    public function getStaff(array $criteres) {
        $champs = [];
        $valeurs = [];

        //eclater le tableau

        foreach ($criteres as $champ => $valeur) {
           //select * from annonces where actif = ?
           //bindvalue(1,valueur)
           $champs[] = "$champ = ?";
           $valeurs[] = $valeur;
        }

        // on transfore letable "chaps" en chaine de caractere

        $liste_champs = implode(' AND ', $champs);

        // on execute la requete
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '. $liste_champs,$valeurs)->fetch();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of dateofbirth
     */ 
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set the value of dateofbirth
     *
     * @return  self
     */ 
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    /**
     * Get the value of placeofbirth
     */ 
    public function getPlaceofbirth()
    {
        return $this->placeofbirth;
    }

    /**
     * Set the value of placeofbirth
     *
     * @return  self
     */ 
    public function setPlaceofbirth($placeofbirth)
    {
        $this->placeofbirth = $placeofbirth;

        return $this;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of function
     */ 
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set the value of function
     *
     * @return  self
     */ 
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of staffnum
     */ 
    public function getStaffnum()
    {
        return $this->staffnum;
    }

    /**
     * Set the value of staffnum
     *
     * @return  self
     */ 
    public function setStaffnum($staffnum)
    {
        $this->staffnum = $staffnum;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of otherfirstname
     */ 
    public function getOtherfirstname()
    {
        return $this->otherfirstname;
    }

    /**
     * Set the value of otherfirstname
     *
     * @return  self
     */ 
    public function setOtherfirstname($otherfirstname)
    {
        $this->otherfirstname = $otherfirstname;

        return $this;
    }

    /**
     * Get the value of staffevaluation
     */ 
    public function getStaffevaluation()
    {
        return $this->staffevaluation;
    }

    /**
     * Set the value of staffevaluation
     *
     * @return  self
     */ 
    public function setStaffevaluation($staffevaluation)
    {
        $this->staffevaluation = $staffevaluation;

        return $this;
    }
}