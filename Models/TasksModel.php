<?php 

namespace App\Models;

class TasksModel extends Model {

    protected $id;
    protected $name;
    protected $description;
    protected $start;
    protected $timeStart;
    protected $end;
    protected $timeEnd;
    protected $project;
    protected $state;
    protected $priority;
    protected $file;
    protected $executor;
    protected $table = 'tasks';

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
     * Get the value of start
     */ 
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get the value of end
     */ 
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set the value of end
     *
     * @return  self
     */ 
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get the value of Project
     */ 
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set the value of Project
     *
     * @return  self
     */ 
    public function setProject($project)
    {
        $this->project = $project;

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
     * Get the value of priority
     */ 
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @return  self
     */ 
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of executor
     */ 
    public function getExecutor()
    {
        return $this->executor;
    }

    /**
     * Set the value of executor
     *
     * @return  self
     */ 
    public function setExecutor($executor)
    {
        $this->executor = $executor;

        return $this;
    }

    /**
     * Get the value of timeStart
     */ 
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set the value of timeStart
     *
     * @return  self
     */ 
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get the value of timeEnd
     */ 
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Set the value of timeEnd
     *
     * @return  self
     */ 
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }
}