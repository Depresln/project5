<?php

namespace App\Entity;

/**
 * Class Post
 * @package App\Entity
 */
class Post
{
    /**
     * @var
     */
    private $title;
    private $chapo;
    private $date;



    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return post title
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getChapo()
    {
        return $this->chapo;
    }

    public function getDate()
    {
        return $this->date;
    }
}