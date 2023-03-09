<h2 class="acf-todolist-sub-title">
  ACF Todo List
</h2>

<div class="todolist-wrapper">
    <form  action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post">
        <?php settings_fields( 'acf-todolist-setings' ); ?>
        <label><b>Post count: </b></label>
        <input type="text" name="todoList[count]" value="10" /> 
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Show Todo List">
    </form>
</div>