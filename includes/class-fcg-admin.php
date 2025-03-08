<?php
/**
 * Admin Section Management Class
 */
class FCG_Admin {
    /**
     * Content generation class instance
     *
     * @var FCG_Generator
     */
    private $generator;

    /**
     * Class constructor
     */
    public function __construct() {
        // Create an instance of the content generation class
        $this->generator = new FCG_Generator();

        // Add admin styles and scripts
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
    }

    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        // Add a log line for debugging
        error_log('Adding admin menu for Fake Content Generator');
        
        add_menu_page(
            'Fake Content Generator',
            'Fake Content',
            'manage_options',
            'fake-content-generator',
            array($this, 'render_admin_page'),
            'dashicons-welcome-write-blog',
            30
        );
    }

    /**
     * Add admin styles and scripts
     */
    public function enqueue_admin_assets($hook) {
        if ('toplevel_page_fake-content-generator' !== $hook) {
            return;
        }

        // Load CSS file based on language
        $locale = get_locale();
        $style = ($locale === 'fa_IR' || $locale === 'fa') ? 'admin-fa.css' : 'admin-en.css';
        
        wp_enqueue_style('fcg-admin-style', FCG_PLUGIN_URL . "assets/css/{$style}", array(), FCG_VERSION);
        wp_enqueue_script('fcg-admin-script', FCG_PLUGIN_URL . 'assets/js/admin.js', array('jquery'), FCG_VERSION, true);
    }

    /**
     * Render admin page
     */
    public function render_admin_page() {
        // Process form if submitted
        if (isset($_POST['fcg_submit'])) {
            $this->handle_form_submission();
        }

        // Display admin page
        include FCG_PLUGIN_DIR . 'views/admin-page.php';
    }

    /**
     * Process submitted form
     */
    private function handle_form_submission() {
        $type = sanitize_text_field($_POST['content_type']); 
        
        if ($type === 'post') {
            $settings = $this->get_post_settings();
            $this->generator->generate_posts($settings);
        } elseif ($type === 'product') {
            $settings = $this->get_product_settings();
            $this->generator->generate_products($settings);
        }
    }

    /**
     * Get post settings
     *
     * @return array
     */
    private function get_post_settings() {
        return array(
            'count' => intval($_POST['post_count']),
            'title_length' => intval($_POST['post_title_length']),
            'author' => intval($_POST['post_author']),
            'category' => isset($_POST['post_category']) ? intval($_POST['post_category']) : 0,
            'paragraphs' => isset($_POST['paragraphs_count']) ? intval($_POST['paragraphs_count']) : 3,
            'image_width' => intval($_POST['image_width']),
            'image_height' => intval($_POST['image_height']),
        );
    }

    /**
     * Get product settings
     *
     * @return array
     */
    private function get_product_settings() {
        return array(
            'count' => intval($_POST['product_count']),
            'image_width' => intval($_POST['product_image_width']),
            'image_height' => intval($_POST['product_image_height']),
            'category' => isset($_POST['product_category']) ? intval($_POST['product_category']) : 0,
        );
    }

    /**
     * Show message to the user
     *
     * @param string $message Message
     * @param string $type Message type (success or error)
     */
    public function show_notice($message, $type = 'success') {
        // Change message text to English
        if ($type === 'success') {
            $message = __('Content created successfully.', 'fake-content-generator');
        } else {
            $message = __('An error occurred while creating content.', 'fake-content-generator');
        }
        
        echo "<div class='fcg-notice {$type}'><p>{$message}</p></div>";
    }
} 