<?php
include "Badge.php";
/**
 * Created by PhpStorm.
 * User: hamlet
 * Date: 4/10/17
 * Time: 1:16 PM
 */
class AutoBadge extends Badge
{
    private $points;

    public function __construct($icon, $title, $info, $points = 0)
    {
        parent::__construct($icon, $title, $info); // TODO: Change the autogenerated stub

        $this->setPoints($points);
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }
}