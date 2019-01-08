<?php
/**
 * Created by PhpStorm.
 * User: Oleh
 * Date: 15.12.2018
 * Time: 17:47
 */

namespace App\Entity;


class TeacherEntity
{
    private $id;
    public $fullname;
    public $scholar_citation;
    public $scholar_h_index;
    public $scopus_h_index;
    public $image;

    /**
     * TeacherEntity constructor.
     * @param $fullname
     */
    public function __construct($fullname, $image)
    {
        $this->fullname = $fullname;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getScholarCitation()
    {
        return $this->scholar_citation;
    }

    /**
     * @param mixed $scholar_citation
     */
    public function setScholarCitation($scholar_citation)
    {
        $this->scholar_citation = $scholar_citation;
    }

    /**
     * @return mixed
     */
    public function getScholarHIndex()
    {
        return $this->scholar_h_index;
    }

    /**
     * @param mixed $scholar_h_index
     */
    public function setScholarHIndex($scholar_h_index)
    {
        $this->scholar_h_index = $scholar_h_index;
    }

    /**
     * @return mixed
     */
    public function getScopusHIndex()
    {
        return $this->scopus_h_index;
    }

    /**
     * @param mixed $scopus_h_index
     */
    public function setScopusHIndex($scopus_h_index)
    {
        $this->scopus_h_index = $scopus_h_index;
    }



}