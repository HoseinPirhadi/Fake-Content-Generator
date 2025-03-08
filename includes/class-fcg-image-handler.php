<?php
/**
 * Image Management Class
 */
class FCG_Image_Handler {
    /**
     * Image width
     *
     * @var int
     */
    private $width;

    /**
     * Image height
     *
     * @var int
     */
    private $height;
    
    /**
     * Content type (post or product)
     *
     * @var string
     */
    private $content_type;

    /**
     * Class constructor
     *
     * @param int $width Image width
     * @param int $height Image height
     * @param string $content_type Content type (post or product)
     */
    public function __construct($width, $height, $content_type = 'post') {
        $this->width = $width;
        $this->height = $height;
        $this->content_type = $content_type;
    }

    /**
     * Attach image to post
     *
     * @param int $post_id Post ID
     */
    public function attach_image_to_post($post_id) {
        $image_url = $this->get_image_url();
        $this->process_and_attach_image($image_url, $post_id);
    }

    /**
     * Get image URL
     *
     * @return string
     */
    private function get_image_url() {
        // Use appropriate seed for content type
        $seed = ($this->content_type === 'product') ? 'product' . rand(1, 20) : 'post' . rand(1, 20);
        
        // Use Picsum with specified seed
        return "https://picsum.photos/seed/{$seed}/{$this->width}/{$this->height}";
    }

    /**
     * Process and attach image to post
     *
     * @param string $image_url Image URL
     * @param int $post_id Post ID
     */
    private function process_and_attach_image($image_url, $post_id) {
        try {
            $image_data = $this->fetch_image_data($image_url);
            if ($image_data === false) return;

            $filename = 'fake-image-' . rand(1000, 9999) . '.jpg';
            $file = $this->save_image($image_data, $filename);

            $this->attach_image($file, $post_id, $filename);
        } catch (Exception $e) {
            error_log('Error in process_and_attach_image: ' . $e->getMessage());
        }
    }

    private function fetch_image_data($image_url) {
        $context = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
        return file_get_contents($image_url, false, $context);
    }

    private function save_image($image_data, $filename) {
        $upload_dir = wp_upload_dir();
        $file_path = wp_mkdir_p($upload_dir['path']) ? $upload_dir['path'] . '/' . $filename : $upload_dir['basedir'] . '/' . $filename;
        file_put_contents($file_path, $image_data);
        return $file_path;
    }

    private function attach_image($file, $post_id, $filename) {
        $attachment = array(
            'post_mime_type' => 'image/jpeg',
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $file, $post_id);
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);
        set_post_thumbnail($post_id, $attach_id);
    }
} 