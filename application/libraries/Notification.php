<?php

/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/13/2018
 * Time: 6:13 PM
 */
class Notification
{
    /*
    //these variables are used to show notification
    public $notificationCheck = 0; // if check is 1 simple notification is shown
    public $notificationMessage = "Notification message!"; // default message
    public $notificationType = "success"; // default type
         * notificationType can be:
         * info
         * success
         * warning
         * danger
         *
    public $notificationTimer = 2000; // notification dispose time in milliseconds
    public $notificationFrom = "top"; // location in vertical alignment
    public $notificationAlign = "center"; // location in horizontal alignment
    // see more about notification settings in include/jsFunctions.php file
    */
    public function success($notificationMessage, $notificationTimer = 2000, $notificationFrom = 'top', $notificationAlign = 'right')
    {
        $notificationType = "success";
        $this->show($notificationMessage, $notificationType, $notificationTimer, $notificationFrom, $notificationAlign);
    }

    public function show($notificationMessage, $notificationType = 'success', $notificationTimer = 2000, $notificationFrom = 'top', $notificationAlign = 'right')
    {
        $data['notification'] = TRUE;

        $data['notificationMessage'] = $notificationMessage;
        $data['notificationType'] = $notificationType;
        $data['notificationTimer'] = $notificationTimer;
        $data['notificationFrom'] = $notificationFrom;
        $data['notificationAlign'] = $notificationAlign;

        $data['dialogTitle'] = '';
        $data['dialogText'] = '';
        $data['dialogType'] = '';

        get_instance()->load->view('dashboard/include/notification', $data);
    }

    public function info($notificationMessage, $notificationTimer = 2000, $notificationFrom = 'top', $notificationAlign = 'right')
    {
        $notificationType = "info";
        $this->show($notificationMessage, $notificationType, $notificationTimer, $notificationFrom, $notificationAlign);
    }

    public function warning($notificationMessage, $notificationTimer = 2000, $notificationFrom = 'top', $notificationAlign = 'right')
    {
        $notificationType = "warning";
        $this->show($notificationMessage, $notificationType, $notificationTimer, $notificationFrom, $notificationAlign);
    }

    public function danger($notificationMessage, $notificationTimer = 2000, $notificationFrom = 'top', $notificationAlign = 'right')
    {
        $notificationType = "danger";
        $this->show($notificationMessage, $notificationType, $notificationTimer, $notificationFrom, $notificationAlign);
    }

    public function dialog($title, $text, $type = 'success')
    {
        $data['notification'] = FALSE;

        $data['dialogTitle'] = $title;
        $data['dialogText'] = $text;
        $data['dialogType'] = $type;

        $data['notificationMessage'] = '';
        $data['notificationType'] = '';
        $data['notificationTimer'] = '';
        $data['notificationFrom'] = '';
        $data['notificationAlign'] = '';

        get_instance()->load->view('dashboard/include/notification', $data);
    }
}

?>
