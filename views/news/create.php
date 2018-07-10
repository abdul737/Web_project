<?php
/**
 * Created by PhpStorm.
 * User: Abdulbosid
 * Date: 1/12/2018
 * Time: 8:59 AM
 */
?>

<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

<label for="title">Title</label>
<textarea name="title"></textarea><br/>

<label for="text">Text</label>
<textarea name="text"></textarea><br/>

<input type="submit" name="submit" value="Create news item"/>
<br/>

</form>
<br/>