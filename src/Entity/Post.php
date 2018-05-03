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
    private $idpost;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $chapo;
    /**
     * @var
     */
    private $date;

    /**
     * @var
     */
    private $content;

    /**
     * @param $idpost
     */
    public function setId($idpost)
    {
        if (is_int($idpost)) {
            $this->idpost = $idpost;
        }
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    /**
     * @param $chapo
     */
    public function setChapo($chapo)
    {
        if (is_string($chapo)) {
            $this->chapo = $chapo;
        }
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        if (is_string($date)) {
            $this->date = $date;
        }
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getIdpost()
    {
        return $this->idpost;
    }

    /**
     * @return post title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '<a href="?post=' . $this->idpost . '">' . $this->title . '</a> - ' . $this->chapo . ' - ' . $this->date;
    }

}