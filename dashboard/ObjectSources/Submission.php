<?php
class Submission extends Homework
{
  //private fields
  private $submitFile;
  private $answerTitle;
  private $answer;
  private $isSubmitted;
  private $submitTime;
  private $isChecked;
  private $grade;
  private $isGood;

  public function __construct($hwId, $instructorId, $kidId, $title, $content, $attachment, $startTime, $endTime, $courseId,
    $submitFile, $answerTitle, $answer, $isSubmitted, $submitTime, $isChecked, $grade, $isGood)
  {
    parent::__construct($hwId, $instructorId, $kidId, $title, $content, $attachment, $startTime, $endTime, $courseId);
    $this->submitFile = $submitFile;
    $this->answerTitle = $answerTitle;
    $this->answer = $answer;
    $this->isSubmitted = $isSubmitted;
    $this->submitTime = $submitTime;
    $this->isChecked = $isChecked;
    $this->grade = $grade;
    $this->isGood = $isGood;
  }

  //public setter and getter methods
  public function getSubmitFile() { return $this-> submitFile; }
  public function setSubmitFile($value) { $this->submitFile = $value; }
  public function getAnswerTitle() { return $this-> answerTitle; }
  public function setAnswerTitle($value) { $this->answerTitle = $value; }
  public function getAnswer() { return $this-> answer; }
  public function setAnswer($value) { $this->answer = $value; }
  public function getIsSubmitted() { return $this-> isSubmitted; }
  public function setIsSubmitted($value) { $this->isSubmitted = $value; }
  public function getSubmitTime() { return $this->submitTime; }
  public function setSubmitTime($value) { $this->submitTime = $value; }
  public function getIsChecked() { return $this-> isChecked; }
  public function setIsChecked($value) { $this->isChecked = $value; }
  public function getGrade() { return $this-> grade; }
  public function setGrade($value) { $this->grade = $value; }
  public function getIsGood() { return $this-> isGood; }
  public function setIsGood($value) { $this->isGood = $value; }
}
 ?>
