<?php

/**
 * Provide a admin area view for Gridli Vue Text Widget
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Gridli_Vue
 * @subpackage Gridli_Vue/admin/partials
 */
?>

<p>
  <label for="<?php echo $this->get_field_id( 'before_widget' ); ?>">Before Widget:</label>
  <input type="text" id="<?php echo $this->get_field_id( 'before_widget' ); ?>" name="<?php echo $this->get_field_name( 'before_widget' ); ?>" value="<?php echo esc_attr( $instance['before_widget'] ); ?>" />
</p>

  <p>
    <label for="<?php echo $this->get_field_id( 'after_widget' ); ?>">After Widget:</label>
    <input type="text" id="<?php echo $this->get_field_id( 'after_widget' ); ?>" name="<?php echo $this->get_field_name( 'after_widget' ); ?>" value="<?php echo esc_attr( $instance['after_widget'] ); ?>" />
  </p>

<p>
  <label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content:', 'gridli-vue');?>
    <textarea rows="5" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $instance['content']; ?></textarea>
  </label>
</p>