<?php

/**
 * Created by PhpStorm.
 * User: hamlet
 * Date: 4/10/17
 * Time: 11:49 AM
 */
class Assignment
{
    private $id;
    private $group;
    private $title;
    private $info;
    private $attachment;
    private $solution;
    private $startTime;
    private $deadLine;
    private $maxPoint;


    public function __construct($id, $group, $title, $info, $startTime, $deadLine, $maxPoint, $solution = null, $attachment = null)
    {
        $this->setId($id);
        $this->setGroup($group);
        $this->setTitle($title);
        $this->setStartTime($startTime);
        $this->setDeadLine($deadLine);
        $this->setInfo($info);
        $this->setMaxPoint($maxPoint);

        $this->setSolution($solution);
        $this->setAttachment($attachment);

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
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

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param mixed $attachment
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * @return mixed
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * @param mixed $solution
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getDeadLine()
    {
        return $this->deadLine;
    }

    /**
     * @param mixed $deadLine
     */
    public function setDeadLine($deadLine)
    {
        $this->deadLine = $deadLine;
    }

    /**
     * @return mixed
     */
    public function getMaxPoint()
    {
        return $this->maxPoint;
    }

    /**
     * @param mixed $maxPoint
     */
    public function setMaxPoint($maxPoint)
    {
        $this->maxPoint = $maxPoint;
    }


}