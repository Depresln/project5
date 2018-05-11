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
     * Post constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @param $data
     */
    private function hydrate($data)
    {
        if (is_array($data)){
            if (isset($data['id'])){
                $this->idpost = $data['id'];
            }
            if (isset($data['title'])){
                $this->title = $data['title'];
            }
            if (isset($data['chapo'])){
                $this->chapo = $data['chapo'];
            }
            if (isset($data['date'])){
                $this->date = $data['date'];
            }
            if (isset($data['content'])){
                $this->content = $data['content'];
            }
        }
    }

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
     * @param string $chapo
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



}