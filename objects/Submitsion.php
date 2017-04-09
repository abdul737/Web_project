<?php
class Submitsion extends Homework
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

  public function _construct($hwId, $instructorId, $kidId, $title, $content, $attachment, $startTime, $endTime, $courseId,
    $sumbitFile, $answerTitle, $answer, $isSubmitted, $submitTime, $isChecked, $grade, $isGood)
  {
    parent::_parent($hwId, $instructorId, $kidId, $title, $content, $attachment, $startTime, $endTime, $courseId);
    $this->submitFile = $submitFile;
    $this->answerTitle = $answerTitle;
    $this->answer = $answer;
    $this->isSubmitted = $isSubmitted;
    $this->submitTime = $submitTime;
    $this->isChecked = $isChecked;
    $this->grade = $grade;
    $this->isGood = $isGood;
  }
  public function _construct($hwId, $sumbitFile, $answerTitle, $answer, $isSubmitted, $submitTime, $isChecked, $grade, $isGood)
  {
    parent::_parent($hwId, 0, 0, "", "", "", "", "", 0);
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
  public function getSubmitFile() { return $submitFile; }
  public function setSubmitFile($value) { $this->submitFile = $value; }
  public function getAnswerTitle() { return $answerTitle; }
  public function setAnswerTitle($value) { $this->answerTitle = $value; }
  public function getAnswer() { return $answer; }
  public function setAnswer($value) { $this->answer = $value; }
  public function getIsSubmitted() { return $isSubmitted; }
  public function setIsSubmitted($value) { $this->isSubmitted = $value; }
  public function getSubmitTime() { return $submitTime; }
  public function setSubmitTime($value) { $this->submitTime = $value; }
  public function getIsChecked() { return $isChecked; }
  public function setIsChecked($value) { $this->isChecked = $value; }
  public function getGrade() { return $grade; }
  public function setGrade($value) { $this->grade = $value; }
  public function getIsGood() { return $isGood; }
  public function setIsGood($value) { $this->isGood = $value; }
}
 ?>
