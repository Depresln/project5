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
    private $id;
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
     * @var
     */
    private $pseudo;

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
        if (is_array($data)) {
            if (isset($data['id'])) {
                $this->id = $data['id'];
            }
            if (isset($data['title'])) {
                $this->title = $data['title'];
            }
            if (isset($data['chapo'])) {
                $this->chapo = $data['chapo'];
            }
            if (isset($data['date'])) {
                $this->date = $data['date'];
            }
            if (isset($data['content'])) {
                $this->content = $data['content'];
            }
            if (isset($data['pseudo'])) {
                $this->pseudo = $data['pseudo'];
            }
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
     * @param $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
}
