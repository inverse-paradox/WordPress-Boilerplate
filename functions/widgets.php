<?php
//add_action('widgets_init', 'ip_load_widgets');
function ip_load_widgets()
{
    register_widget('IP_Widget');
}


/* ===========================================================
    Example widget
=========================================================== */
class IP_Widget extends WP_Widget
{

    function __construct()
    {
        /**
        * @param string $id_base Optional Base ID for the widget, lower case,
        * if left empty a portion of the widget's class name will be used. Has to be unique.
        * @param string $name Name for the widget displayed on the configuration page.
        * @param array $widget_options Optional Passed to wp_register_sidebar_widget()
        *       - description: shown on the configuration page
        *       - classname
        * @param array $control_options Optional Passed to wp_register_widget_control()
        *       - width: required if more than 250px
        *       - height: currently not used but may be needed in the future
        */
        parent::__construct(
            'ip-widget',
            'IP Widget',
            array(
                'description' => 'Example widget',
                'classname' => 'widget_ip_widget'
            ),
            array(
                'width' => '300',
                'height' => '350'
            )
        );
    }

    /* Output to theme */
    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $link = $instance['link'];

        /* Before widget (defined by themes). */
        echo $before_widget;

        /* Title of widget (before and after defined by themes). */
        if ($title) {
            echo $before_title . $title . $after_title;
        }

        echo 'Widget Content';

        /* After widget (defined by themes). */
        echo $after_widget;
    }

    /* Save widget info */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        /* Widget fields */
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    /* Backend options form */
    function form( $instance ) {

        /* Field defaults */
        $defaults = array('title' => 'IP Widget');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%" />
        </p>

    <?php }

}