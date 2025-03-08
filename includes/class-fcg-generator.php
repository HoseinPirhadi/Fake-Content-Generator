<?php
/**
 * Content Generation Class
 */
class FCG_Generator {
    /**
     * Faker instance
     *
     * @var Faker\Generator
     */
    private $faker;

    /**
     * Current language
     *
     * @var string
     */
    private $locale;

    /**
     * Class constructor
     */
    public function __construct() {
        $this->locale = get_locale();
        $this->initialize_faker($this->locale);
    }

    /**
     * Initialize Faker
     *
     * @param string $locale Language
     */
    private function initialize_faker($locale) {
        try {
            // Ensure the language format is correct
            $locale = in_array($locale, ['fa_IR', 'fa-IR', 'fa']) ? 'fa_IR' : $locale;
            
            $this->faker = Faker\Factory::create($locale);
            
            // Add custom provider for Persian text
            if ($locale === 'fa_IR') {
                $this->faker->addProvider(new Persian_Text_Provider($this->faker));
                error_log('PersianTextProvider added to Faker');
            }
        } catch (Exception $e) {
            $this->fallback_faker();
        }
        
        error_log('Faker initialized with locale: ' . $locale);
    }

    private function fallback_faker() {
        $this->faker = Faker\Factory::create('en_US');
        $this->locale = 'en_US';
        error_log('Error initializing Faker: ' . $e->getMessage());
    }

    /**
     * Generate posts
     *
     * @param array $settings Settings
     */
    public function generate_posts($settings) {
        $image_handler = new FCG_Image_Handler(
            $settings['image_width'], 
            $settings['image_height'],
            'post' // Content type
        );
        
        for ($i = 0; $i < $settings['count']; $i++) {
            $post = array(
                'post_title' => $this->locale === 'fa_IR' ? 
                    $this->faker->persianTitle($settings['title_length']) : 
                    $this->faker->sentence($settings['title_length']),
                'post_content' => $this->generate_content($settings['paragraphs']),
                'post_status' => 'publish',
                'post_author' => $settings['author'],
                'post_category' => array($settings['category'])
            );

            $post_id = wp_insert_post($post);
            if ($post_id) {
                $image_handler->attach_image_to_post($post_id);
            }
        }

        $this->show_notice(__('Posts were created successfully.', 'fake-content-generator'), 'success');
    }

    /**
     * Generate products
     *
     * @param array $settings Settings
     */
    public function generate_products($settings) {
        if (!class_exists('WooCommerce')) {
            $this->show_notice(__('WooCommerce plugin is not active!', 'fake-content-generator'), 'error');
            return;
        }

        $image_handler = new FCG_Image_Handler(
            $settings['image_width'], 
            $settings['image_height'],
            'product' // Content type
        );
        
        for ($i = 0; $i < $settings['count']; $i++) {
            $product = new WC_Product_Simple();
            $product_name = $this->locale === 'fa_IR' ? 
                $this->faker->persianProductTitle() : 
                $this->faker->word() . ' ' . $this->faker->word();
            
            $product->set_name($product_name);
            $product->set_description($this->generate_product_description());
            $product->set_regular_price($this->faker->numberBetween(1000, 100000));
            $product->set_manage_stock(true);
            $product->set_stock_quantity($this->faker->numberBetween(0, 100));
            $product->set_weight($this->faker->randomFloat(2, 0.1, 10));
            $product->set_length($this->faker->randomFloat(2, 5, 50));
            $product->set_width($this->faker->randomFloat(2, 5, 50));
            $product->set_height($this->faker->randomFloat(2, 5, 50));
            $product->set_category_ids([$settings['category']]);
            $product->set_sku(strtoupper($this->faker->lexify('??-???')));
            $product->set_status('publish');
            $product_id = $product->save();

            if ($product_id) {
                $image_handler->attach_image_to_post($product_id);
            }
        }

        $this->show_notice(__('The products were successfully created.', 'fake-content-generator'), 'success');
    }

    /**
     * Generate product description
     *
     * @param string $category Content category
     * @return string
     */
    private function generate_product_description($category = null) {
        $description = '';
        $paragraphs = $this->faker->numberBetween(2, 5);
        
        for ($i = 0; $i < $paragraphs; $i++) {
            if ($this->locale === 'fa_IR') {
                $description .= '<p>' . $this->faker->persianParagraph(rand(3, 6)) . '</p>';
            } else {
                $description .= '<p>' . $this->faker->paragraph(rand(3, 6)) . '</p>';
            }
        }
        
        if ($this->locale === 'fa_IR') {
            $description .= '<h3>Product Features:</h3><ul>';
        } else {
            $description .= '<h3>Product Features:</h3><ul>';
        }
        
        $features = $this->faker->numberBetween(3, 7);
        
        // Get keywords related to the category
        if (method_exists($this->faker, 'getContentCategory')) {
            $categoryData = $this->faker->getContentCategory($category, $this->locale);
        } else {
            $categoryData = array('keywords' => array());
        }
        $keywords = $categoryData['keywords'];
        
        for ($i = 0; $i < $features; $i++) {
            if ($this->locale === 'fa_IR') {
                $feature = $this->faker->persianSentence();
                // Add keywords to features
                if (count($keywords) > 0 && mt_rand(0, 100) > 70) {
                    $keyword = $keywords[array_rand($keywords)];
                    $feature = str_replace('محصول', $keyword, $feature);
                }
                $description .= '<li>' . $feature . '</li>';
            } else {
                $description .= '<li>' . $this->faker->sentence . '</li>';
            }
        }
        
        $description .= '</ul>';
        return $description;
    }

    /**
     * Generate content
     *
     * @param int $paragraphs Number of paragraphs
     * @param string $category Content category
     * @return string
     */
    private function generate_content($paragraphs, $category = null) {
        $content = '';
        
        // Get keywords related to the category
        if (method_exists($this->faker, 'getContentCategory')) {
            $categoryData = $this->faker->getContentCategory($category, $this->locale);
        } else {
            $categoryData = array('keywords' => array());
        }
        $keywords = $categoryData['keywords'];
        
        for ($j = 0; $j < $paragraphs; $j++) {
            if ($this->locale === 'fa_IR') {
                $paragraph = $this->faker->persianParagraph(rand(3, 6));
                
                // Add keywords to the text
                if (count($keywords) > 0 && mt_rand(0, 100) > 70) {
                    $keyword = $keywords[array_rand($keywords)];
                    $paragraph = str_replace('محصول', $keyword, $paragraph);
                }
                
                $content .= '<p>' . $paragraph . '</p>';
            } else {
                $content .= '<p>' . $this->faker->paragraph(rand(3, 6)) . '</p>';
            }
        }
        return $content;
    }

    /**
     * Show message to the user
     *
     * @param string $message Message
     * @param string $type Message type (success or error)
     */
    private function show_notice($message, $type = 'success') {
        $class = ($type === 'success') ? 'updated' : 'error';
        echo "<div class='{$class} notice'><p>{$message}</p></div>";
    }
} 