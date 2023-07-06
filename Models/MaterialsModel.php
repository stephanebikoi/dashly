<?php 

namespace App\Models;

class MaterialsModel extends Model {

    protected $id;
    protected $name;
    protected $brand;
    protected $num_serie;
    protected $description;
    protected $state;
    protected $datepurchase;
    protected $purchaseprice;
    protected $image;
    protected $table = 'materials';


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
     * Get the value of brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     *
     * @return  self
     */ 
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of num_serie
     */ 
    public function getNum_serie()
    {
        return $this->num_serie;
    }

    /**
     * Set the value of num_serie
     *
     * @return  self
     */ 
    public function setNum_serie($num_serie)
    {
        $this->num_serie = $num_serie;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of datepurchase
     */ 
    public function getDatepurchase()
    {
        return $this->datepurchase;
    }

    /**
     * Set the value of datepurchase
     *
     * @return  self
     */ 
    public function setDatepurchase($datepurchase)
    {
        $this->datepurchase = $datepurchase;

        return $this;
    }

    /**
     * Get the value of purchaseprice
     */ 
    public function getPurchaseprice()
    {
        return $this->purchaseprice;
    }

    /**
     * Set the value of purchaseprice
     *
     * @return  self
     */ 
    public function setPurchaseprice($purchaseprice)
    {
        $this->purchaseprice = $purchaseprice;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}