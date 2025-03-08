<div class="wrap">
    <h1></h1>
    <div class="fcg-header">
        <h1><?php _e('Fake Content Generator', 'fake-content-generator'); ?></h1>
        <p><?php _e('With this plugin, you can easily generate dummy content for your website.', 'fake-content-generator'); ?></p>
    </div>
    
    <div class="fcg-container">
        <div class="fcg-sidebar">
            <div class="card">
                <h2><?php _e('Help', 'fake-content-generator'); ?></h2>
                <p><?php _e('Using this plugin, you can quickly generate dummy content for your website. This content can include posts or products.', 'fake-content-generator'); ?></p>
                <p><?php _e('To get started, select the content type and apply your desired settings.', 'fake-content-generator'); ?></p>
            </div>
        </div>
        
        <div class="fcg-main">
            <form method="post">
                <div class="form-section">
                    <h2><?php _e('General Settings', 'fake-content-generator'); ?></h2>
                    <div class="fcg-field">
                        <label><?php _e('Content Type:', 'fake-content-generator'); ?></label>
                        <div class="fcg-switch-container">
                            <input type="hidden" name="content_type" id="content_type_input" value="post">
                            <div class="fcg-switch">
                                <div class="fcg-switch-option active" data-value="post"><?php _e('Post', 'fake-content-generator'); ?></div>
                                <div class="fcg-switch-option" data-value="product"><?php _e('Product', 'fake-content-generator'); ?></div>
                                <div class="fcg-switch-slider"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="post_options" class="form-section">
                    <h2><?php _e('Post Settings', 'fake-content-generator'); ?></h2>
                    <div class="fcg-field">
                        <label><?php _e('Number of Posts:', 'fake-content-generator'); ?></label>
                        <input type="number" name="post_count" value="5" min="1" max="50">
                    </div>
                    <div class="fcg-field">
                        <label><?php _e('Title Length:', 'fake-content-generator'); ?></label>
                        <input type="number" name="post_title_length" value="4" min="3" max="15">
                        <small><?php _e('(Number of words)', 'fake-content-generator'); ?></small>
                    </div>
                    <div class="fcg-field-group">
                        <div class="fcg-field">
                            <label><?php _e('Author:', 'fake-content-generator'); ?></label>
                            <?php wp_dropdown_users(['name' => 'post_author']); ?>
                        </div>
                        <div class="fcg-field">
                            <label><?php _e('Category:', 'fake-content-generator'); ?></label>
                            <?php wp_dropdown_categories(['name' => 'post_category', 'hide_empty' => false]); ?>
                        </div>
                    </div>
                    <div class="fcg-field-group">
                        <div class="fcg-field">
                            <label><?php _e('Image Width:', 'fake-content-generator'); ?></label>
                            <input type="number" name="image_width" value="800" min="100" max="2000">
                            <small><?php _e('(Pixels)', 'fake-content-generator'); ?></small>
                        </div>
                        <div class="fcg-field">
                            <label><?php _e('Image Height:', 'fake-content-generator'); ?></label>
                            <input type="number" name="image_height" value="600" min="100" max="2000">
                            <small><?php _e('(Pixels)', 'fake-content-generator'); ?></small>
                        </div>
                    </div>
                </div>
                
                <div id="product_options" class="form-section" style="display: none;">
                    <h2><?php _e('Product Settings', 'fake-content-generator'); ?></h2>
                    <div class="fcg-field">
                        <label><?php _e('Number of Products:', 'fake-content-generator'); ?></label>
                        <input type="number" name="product_count" value="5" min="1" max="50">
                    </div>
                    <div class="fcg-field-group">
                        <div class="fcg-field">
                            <label><?php _e('Product Image Width:', 'fake-content-generator'); ?></label>
                            <input type="number" name="product_image_width" value="800" min="100" max="2000">
                            <small><?php _e('(Pixels)', 'fake-content-generator'); ?></small>
                        </div>
                        <div class="fcg-field">
                            <label><?php _e('Product Image Height:', 'fake-content-generator'); ?></label>
                            <input type="number" name="product_image_height" value="800" min="100" max="2000">
                            <small><?php _e('(Pixels)', 'fake-content-generator'); ?></small>
                        </div>
                    </div>
                    <div class="fcg-field">
                        <label><?php _e('Category:', 'fake-content-generator'); ?></label>
                        <?php 
                        if (taxonomy_exists('product_cat')) {
                            wp_dropdown_categories(['name' => 'product_category', 'taxonomy' => 'product_cat', 'hide_empty' => false]);
                        } else {
                            echo '<p class="fcg-notice warning">' . __('WooCommerce is not installed or no product categories are available.', 'fake-content-generator') . '</p>';
                        }
                        ?>
                    </div>
                </div>

                <input type="submit" name="fcg_submit" class="fcg-submit" value="<?php _e('Create Content', 'fake-content-generator'); ?>">
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('content_type').addEventListener('change', function() {
        document.getElementById('post_options').style.display = this.value === 'post' ? 'block' : 'none';
        document.getElementById('product_options').style.display = this.value === 'product' ? 'block' : 'none';
    });
</script> 