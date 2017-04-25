<?php

/**
 * Created by PhpStorm.
 * User: hamlet
 * Date: 4/10/17
 * Time: 1:05 PM
 */
class Badge
{
    private $icon;          //Blob
    private $title;
    private $info;



    public function _construct($icon, $title, $info)
    {
        $this->setInfo($info);
        $this->setTitle($title);
        $this->setIcon($icon);
    }
    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }





}