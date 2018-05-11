<?php

namespace App\Entity;

/**
 * Class Comment
 * @package App\Entity
 */
class Comment
{
    /**
     * @var
     */
    private $idComment;
    /**
     * @var
     */
    private $author;
    /**
     * @var
     */
    private $date;
    /**
     * @var
     */
    private $content;

    /**
     * Comment constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @param $data
     */
    public function hydrate($data)
    {
        if(is_array($data)){
            if(isset($data['id'])){
                $this->idComment = $data['id'];
            }
            if(isset($data['author'])){
                $this->author = $data['author'];
            }
            if(isset($data['date'])){
                $this->date = $data['date'];
            }
            if(isset($data['content'])){
                $this->content = $data['content'];
            }
        }
    }

    /**
     * @param $idComment
     */
    public function setIdComment($idComment)
    {
        $this->idComment = $idComment;
    }

    /**
     * @param $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
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