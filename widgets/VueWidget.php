<?php

class VueWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct('VueWidget', __('Vue Widget', 'laravel_mix_vue_widget_domain'), [
            'description' => __('Sample Vue widget based on WPBeginner Tutorial', 'laravel_mix_vue_widget_domain')
        ]);

        wp_enqueue_script("vue-widget-counter", get_stylesheet_directory_uri() . "/compiled/js/counter.js", [], false, true);
    }

    /**
     * Widget Frontend
     *
     * @param $args
     * @param $instance
     *
     * @return void
     */
    public function widget($args, $instance): void
    {

        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if ( ! empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // This is where you run the code and display the output
        echo '<div id="counter-app"></div>';

        echo $args['after_widget'];
    }

    /**
     * Widget Backend Form
     *
     * @param $instance
     *
     * @return void
     */
    public function form($instance): void
    {
        $title = $instance['title'] ?? __('New title', 'laravel_mix_vue_widget_domain');

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    /**
     * Updating widget replacing old instances with new
     *
     * @param $new_instance
     * @param $old_instance
     *
     * @return array
     */
    public function update($new_instance, $old_instance): array
    {
        return [
            "title" => ( ! empty($new_instance['title'])) ? strip_tags($new_instance['title']) : ''
        ];
    }
}

// Register and load the widget
function laravel_mix_vue_load_widget(): void
{
    register_widget(VueWidget::class);
}

add_action('widgets_init', 'laravel_mix_vue_load_widget');