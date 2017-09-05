<?php

/**
 * Register a text widget
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Gridli_Vue
 * @subpackage Gridli_Vue/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Gridli_Vue
 * @subpackage Gridli_Vue/includes
 * @author     Li Li <email@example.com>
 */

class Gridli_Vue_Widget_Text extends WP_Widget {
  /**
   * Widget id.
   *
   * @since    1.0.0
   *
   * @var      string
   */
  protected $widget_slug = 'gridli-vue-text-widget';

  /**
   * Specifies the classname and description, instantiates the widget,
   * and includes necessary stylesheets and JavaScript.
   */
  public function __construct() {
    parent::__construct(
      $this->get_widget_slug(),
      __( 'Gridli Vue Text Widget', $this->get_widget_slug() ), // widget name
      array(
        'classname'  => $this->get_widget_slug().'-class',
        'description' => __( 'Text widget includes HTML and Javascript with custom container.', $this->get_widget_slug() )
      )
    );

    // Refreshing the widget's cached output with each new post
    add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
    add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
    add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
  }

  /**
   * Return the widget slug which is also the widget id
   *
   * @since    1.0.0
   *
   * @return    Plugin slug variable.
   */
  public function get_widget_slug() {
    return $this->widget_slug;
  }

  /**
   * Outputs the content of the widget.
   *
   * @param array args  The array of form elements
   * @param array instance The current instance of the widget
   */
  public function widget( $args, $instance ) {

    // Check if there is a cached output
    $cache = wp_cache_get( $this->get_widget_slug(), 'widget' );
    if ( !is_array( $cache ) )
      $cache = array();
    if ( ! isset ( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;
    if ( isset ( $cache[ $args['widget_id'] ] ) )
      return print $cache[ $args['widget_id'] ];

    // Ignore sidebar settings: $args['before_widget'], $args['after_widget']
    $widget_string = $instance['before_widget'];
    ob_start();
    include( plugin_dir_path( __FILE__ ) . '../public/partials/gridli-vue-public-widget-text.php' );
    $widget_string .= ob_get_clean();
    $widget_string .= $instance['after_widget'];

    // $cache[ $args['widget_id'] ] = $widget_string;
    // wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );
    print $widget_string;
  }


  public function flush_widget_cache() {
    wp_cache_delete( $this->get_widget_slug(), 'widget' );
  }

  /**
   * Processes the widget's options to be saved.
   *
   * @param array new_instance The new instance of values to be generated via the update.
   * @param array old_instance The previous instance of values before the update.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'before_widget' ] = $new_instance[ 'before_widget' ]; // strip_tags()
    $instance[ 'after_widget' ] = $new_instance[ 'after_widget' ];
    $instance[ 'content' ] = $new_instance[ 'content' ];
    return $instance;
  }

  /**
   * Generates the administration form for the widget.
   *
   * @param array instance The array of keys and values for the widget.
   */
  public function form( $instance ) {
    $instance = wp_parse_args(
      (array) $instance
    );
    $instance['before_widget'] = ! empty( $instance['before_widget'] ) ? $instance['before_widget'] : '';
    $instance['after_widget'] = ! empty( $instance['after_widget'] ) ? $instance['after_widget'] : '';
    $instance['content'] = ! empty( $instance['content'] ) ? $instance['content'] : '';

    include( plugin_dir_path( __FILE__ ) . '../admin/partials/gridli-vue-admin-widget-text.php' );
  }

}
