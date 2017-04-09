<?php
class Homework
{
  //private fiedls
  private $hwId;
  private $instructorId;
  private $kidId;
  private $title;
  private $content;
  private $attachment;
  private $startTime;
  private $endTime;
  private $courseId;

  //constructor
  public function _construct($hwId, $instructorId, $kidId, $title, $content, $attachment, $startTime, $endTime, $courseId)
  {
    $this->hwId = $hwId;
    $this->instructorId = $instructorId;
    $this->kidId = $kidId;
    $this->title = $title;
    $this->content = $content;
    $this->attachment = $attachment;
    $this->startTime = $startTime;
    $this->endTime = $endTime;
    $this->courseId = $courseId;
  }

  //public setter and getter methods
  public function getHwId() { return $hwId; }
  public function setHwId($value) { $this->hwId = $value; }
  public function getInstructorId() { return $instructorId; }
  public function setInstructorId($value) { $this->instructorId = $value; }
  public function getKidId() { return $kidId; }
  public function setKidId($value) { $this->kidId = $value; }
  public function getTitle() { return $title; }
  public function setTitle($value) { $this->title = $value; }
  public function getContent() { return $content; }
  public function setContent($value) { $this->content = $value; }
  public function getAttachment() { return $attachment; }
  public function setAttachment($value) { $this->attachent = $value; }
  public function getStartTime() { return $startTime; }
  public function setStartTime($value) { $this->startTime = $value; }
  public function getEndTime() { return $endTime; }
  public function setEndTime($value) { $this->endTime = $value; }
  public function getCourseId() { return $courseId; }
  public function setCourseId($value) { $this->courseId = $value; }
}
 ?>
