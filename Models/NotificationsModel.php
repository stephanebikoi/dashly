<?php 

namespace App\Models;

class NotificationsModel extends Model {

    protected $id;
    protected $name;
    protected $message;
    protected $active;
    protected $destinataire;
    protected $reference;

    protected $date;
    protected $table = 'notifications';

    public function deactiveNotifications(int $id){
        $query = $this->requete("SELECT * FROM $this->table WHERE destinataire = $id AND active = 0 ORDER BY id DESC LIMIT 0,5");
        return $query->fetchAll();
    }
    //$deactive_notifications = "Select * from inf where active = 0 ORDER BY n_id DESC LIMIT 0,5";
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of destinataire
     */ 
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set the value of destinataire
     *
     * @return  self
     */ 
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}