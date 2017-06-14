<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 6/14/2017
 * Time: 4:14 PM
 */
?>
<!-- javascript for init date picker -->
<script>
    $('.datetimepicker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });</script>

<!-- Script is needed while working with 'single select' in 'register to course' of 'parent' -->
<script>
$(document).ready(function(){
    //Listen for a click on selectStudent of the dropdown items
    $("div[name='selectStudent'] ul[role='listbox'] > li").click(function(){
        //Get the value
        var value = $(this).attr("data-original-index");
        //Put the retrieved value into the hidden input
        $("input[name='selectStudentId']").val(value);
    });
    //Listen for a click on selectCourse of the dropdown items
    $("div[name='selectCourse'] ul[role='listbox'] > li").click(function(){
        //Get the value
        var value = $(this).attr("data-original-index");
        //Put the retrieved value into the hidden input
        $("input[name='selectCourseId']").val(value);
    });
    //Listen for a click on selectTime of the dropdown items
    $("div[name='selectTime'] ul[role='listbox'] > li").click(function(){
        //Get the value
        var value = $(this).attr("data-original-index");
        //Put the retrieved value into the hidden input
        $("input[name='selectTimeId']").val(value);
    });
});
 </script>
 <?php if($notificationCheck == 1){ ?>
    <!-- javascript simple Notification showNotification -->
    <script>
        function showNotification(){

            $.notify({
                icon: "add_alert",
                message: "<?= $notificationMessage ?>"

            },{
                type: '<?= $notificationType ?>',
                timer: '<?= $notificationTimer ?>',
                placement: {
                    from: '<?= $notificationFrom ?>',
                    align: '<?= $notificationAlign ?>'
                }
            });
        }
    </script>
<?php } ?>

<script>
    window.onload = function () {
        showNotification();
    }
</script>
