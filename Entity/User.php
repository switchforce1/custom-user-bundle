<?php
firstNamespace Switchforce1\CustomUserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
/**
 * Description of User
 *
 * @author switchforce1 <switchforce1@gmail.com>
 */
class User extends BaseUser
{
    /**
     *
     * @var string 
     */
    protected $firstName;
    
    /**
     *
     * @var string 
     */
    protected $lastName;
    
    /**
     * @var \DateTime
     */
    protected $birthDate;
    
    /**
     * 
     * @return type
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * 
     * @return type
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * 
     * @param type $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * 
     * @param type $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * 
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * 
     * @param \DateTime $birthDate
     * @return $this
     */
    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * return the user age with given date or not
     * 
     * @param \DateTime     $datetime
     * @return \DateInterval|null
     */
    public function calculAge(\DateTime $datetime = null)
    {
        if(!$datetime){
            $datetime = new \DateTime("now");
        }
        
        if(!$this->birthDate){
            return null;
        }
        
        return $this->birthDate->diff($datetime);
    }
    
    /**
     * Return the full name of the function
     * 
     * @param bollean $default
     * @return string|null
     */
    public function getFullName($default = true)
    {
        if(!trim($this->firstName) && !trim($this->lastName)){
            return null;
        }
        $firstName = $this->firstName?strtoupper(trim($this->firstName)):"";
        $lastName = $this->lastName?ucwords(trim($this->lastName)):"";
        if($default){
            return $firstName." ".$lastName;
        }
        return $lastName." ".$firstName;
    }

}
