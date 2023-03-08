<h2 class="acf-todolist-sub-title">
  ACF Todo List
</h2>

<div class="todolist-wrapper">
    <form  action="<?php echo admin_url( 'options.php' ); ?>" method="post">
        <?php settings_fields( 'acf_todolist_setings' ); ?>
        <label><b>Post count: </b></label>
        <input type="text" name="salsify[hour]" value="10" /> 
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Show Todo List">
    </form>
</div>