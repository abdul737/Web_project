<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/13/2018
 * Time: 6:58 PM
 */

//<!-- javascript simple Notification showNotification -->

echo "<script>
                function showNotification(){
        
                    $.notify({
                        icon: 'add_alert',
                        message: '{$notificationMessage}'
        
                    },{
                        type: '{$notificationType}',
                        timer: '{$notificationTimer}',
                        placement: {
                            from: '{$notificationFrom}',
                            align: '{$notificationAlign}'
                        }
                    });
                }
            </script>";
?>

<script>
    window.onload = function () {
        <?php if (isset($notification) && $notification === TRUE): ?>
        showNotification();
        <?php endif; ?>
        <?php if (isset($notification) && $notification === FALSE): ?>
        setTimeout(swal("<?=$dialogTitle?>", "<?=$dialogText?>", "<?=$dialogType?>"), 200);
        <?php endif; ?>
    }
</script>
