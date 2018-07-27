<?php

namespace App\Entity;

/**
 * Class Comment
 * @package App\Entity
 */
class Comment
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $author;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var string
     */
    private $content;
    /**
     * @var boolean
     */
    private $validation;

    /**
     * Comment constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @param array $data
     */
    public function hydrate($data)
    {
        if (is_array($data)) {
            if (isset($data['id'])) {
                $this->id = $data['id'];
            }
            if (isset($data['author'])) {
                $this->author = $data['author'];
            }
            if (isset($data['date'])) {
                $this->date = $data['date'];
            }
            if (isset($data['content'])) {
                $this->content = $data['content'];
            }
            if (isset($data['validation'])) {
                $this->validation = $data['validation'];
            }
        }
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param $validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;
    }

    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->id;
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

    /**
     * @return mixed
     */
    public function getValidation()
    {
        return $this->validation;
    }
}
