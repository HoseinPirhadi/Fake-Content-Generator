<?php
/**
 * Persian Text Provider Class
 */
class Persian_Text_Provider extends Faker\Provider\Base {
    /**
     * Persian words
     *
     * @var array
     */
    protected static $persianWords = array(
        'محصول', 'کیفیت', 'خدمات', 'پشتیبانی', 'ارسال', 'تخفیف', 'ویژه',
        'جدید', 'محبوب', 'پرفروش', 'دیجیتال', 'هوشمند', 'حرفه‌ای', 'اصل',
        'گارانتی', 'رایگان', 'سریع', 'آسان', 'مطمئن', 'برتر', 'لوازم',
        'کالا', 'فروشگاه'
    );
    
    /**
     * Persian products
     *
     * @var array
     */
    protected static $persianProducts = array(
        'گوشی', 'لپ‌تاپ', 'تبلت', 'تلویزیون', 'یخچال', 'ماشین لباسشویی',
        'ماشین ظرفشویی', 'جاروبرقی', 'مایکروویو', 'اجاق گاز', 'کولر',
        'پنکه', 'بخاری', 'کامپیوتر', 'مانیتور', 'پرینتر', 'اسکنر',
        'دوربین', 'هدفون', 'اسپیکر', 'ساعت هوشمند', 'کنسول بازی',
        'موس', 'کیبورد', 'هارد اکسترنال', 'فلش مموری', 'کارت حافظه',
        'شارژر', 'پاوربانک', 'مودم', 'روتر', 'هاب', 'دانگل', 'مبدل',
        'کابل', 'محافظ صفحه', 'قاب گوشی', 'کیف لپ‌تاپ', 'کوله پشتی',
        'میز کامپیوتر', 'صندلی گیمینگ', 'میکروفون', 'وب‌کم', 'هدست'
    );
    
    /**
     * Persian features
     *
     * @var array
     */
    protected static $persianFeatures = array(
        'صفحه نمایش', 'باتری', 'پردازنده', 'حافظه', 'دوربین', 'اسپیکر',
        'طراحی', 'وزن', 'ابعاد', 'رنگ', 'کیفیت ساخت', 'مقاومت',
        'گارانتی', 'پشتیبانی', 'قیمت', 'کارایی', 'سرعت', 'دقت',
        'رزولوشن', 'کنتراست', 'روشنایی', 'وضوح تصویر', 'کیفیت صدا',
        'عمر باتری', 'سرعت شارژ', 'ظرفیت', 'قدرت موتور', 'مصرف انرژی',
        'سیستم عامل', 'نرم‌افزار', 'رابط کاربری', 'اتصالات', 'پورت‌ها',
        'بلوتوث', 'وای‌فای', 'حسگرها', 'امنیت', 'حریم خصوصی', 'ضد آب'
    );
    
    /**
     * Persian article topics
     *
     * @var array
     */
    protected static $persianTopics = array(
        'تکنولوژی', 'فناوری', 'آموزش', 'سلامت', 'ورزش', 'هنر', 'فرهنگ',
        'اقتصاد', 'سیاست', 'جامعه', 'محیط زیست', 'گردشگری', 'آشپزی',
        'موسیقی', 'سینما', 'ادبیات', 'تاریخ', 'علم', 'روانشناسی', 'فلسفه',
        'کسب و کار', 'استارتاپ', 'بازاریابی', 'مدیریت', 'برنامه‌نویسی',
        'طراحی', 'معماری', 'دکوراسیون', 'مد و لباس', 'زیبایی و آرایش'
    );
    
    /**
     * Persian article title patterns
     *
     * @var array
     */
    protected static $persianTitlePatterns = array(
        '%s: راهنمای جامع و کامل',
        'چگونه %s را بهبود دهیم؟',
        '%s چیست و چه کاربردی دارد؟',
        '۱۰ نکته مهم درباره %s',
        'بررسی تخصصی %s',
        'آموزش %s به زبان ساده',
        'همه چیز درباره %s',
        'مقایسه بهترین‌های %s در سال ۱۴۰۲',
        'راهنمای خرید %s',
        'آشنایی با اصول %s',
        'چرا %s اهمیت دارد؟',
        'تاریخچه %s و تحولات آن',
        'آینده %s چگونه خواهد بود؟',
        'تأثیر %s بر زندگی روزمره',
        'چالش‌های %s در دنیای امروز'
    );
    
    /**
     * Persian product title patterns
     *
     * @var array
     */
    protected static $persianProductTitlePatterns = array(
        '%s %s %s مدل %s',
        '%s %s %s سری %s',
        '%s %s طرح %s',
        '%s %s %s با گارانتی %s',
        '%s %s %s اصل',
        '%s %s %s نسخه %s',
        '%s %s %s مخصوص %s',
        '%s %s %s ویژه %s',
        'پکیج ویژه %s %s %s',
        'ست %s %s %s'
    );
    
    /**
     * Persian meaningful sentence patterns
     *
     * @var array
     */
    protected static $persianSentencePatterns = array(
        'این %s با کیفیت %s و قیمت مناسب عرضه می‌شود.',
        'محصول %s دارای ویژگی‌های %s است که آن را منحصر به فرد می‌کند.',
        'اگر به دنبال %s با %s هستید، این محصول بهترین گزینه است.',
        'تجربه استفاده از %s %s را از دست ندهید.',
        'این %s با طراحی زیبا و کارایی بالا، انتخابی عالی برای شماست.'
    );
    
    /**
     * Persian meaningful paragraph patterns
     *
     * @var array
     */
    protected static $persianParagraphPatterns = array(
        'در دنیای امروز، %s %s یکی از ملزومات زندگی محسوب می‌شود. این محصول با ویژگی‌های %s خود، نیازهای شما را به خوبی برآورده می‌کند. طراحی زیبا و کاربردی آن باعث شده تا استفاده از آن لذت‌بخش باشد.',
        
        'به دنبال یک %s %s با کیفیت هستید؟ محصول ما با %s عالی و قیمت مناسب، بهترین انتخاب برای شماست. این محصول با گارانتی اصل و خدمات پس از فروش عالی ارائه می‌شود تا خیال شما از بابت خرید راحت باشد.',
        
        '%s %s جدید ما با ویژگی‌های منحصربفرد، تحولی در صنعت ایجاد کرده است. این محصول با %s بی‌نظیر، تجربه‌ای متفاوت را برای شما به ارمغان می‌آورد. کیفیت ساخت بالا و مواد اولیه درجه یک، دوام و طول عمر محصول را تضمین می‌کند.',
        
        'استفاده از %s %s در زندگی روزمره می‌تواند بسیاری از کارهای شما را آسان‌تر کند. این محصول با %s پیشرفته، سرعت انجام کارها را افزایش داده و از اتلاف وقت جلوگیری می‌کند. طراحی هوشمندانه آن نیز باعث شده تا استفاده از آن برای همه افراد، حتی مبتدیان، آسان باشد.',
        
        'در طراحی %s %s از جدیدترین فناوری‌های روز دنیا استفاده شده است. این محصول با بهره‌گیری از %s پیشرفته، عملکردی فراتر از انتظار شما خواهد داشت. همچنین، مصرف انرژی بهینه آن باعث کاهش هزینه‌های شما در درازمدت خواهد شد.',
        
        'کیفیت و دوام %s %s ما زبانزد خاص و عام است. این محصول با %s استثنایی، سال‌ها بدون مشکل کار خواهد کرد. پشتیبانی فنی ۲۴ ساعته و خدمات پس از فروش گسترده نیز از دیگر مزایای خرید از ماست.'
    );
    
    /**
     * Persian adjectives
     *
     * @var array
     */
    protected static $persianAdjectives = array(
        'حرفه‌ای', 'مدرن', 'جدید', 'پیشرفته', 'هوشمند', 'باکیفیت', 'اصل',
        'اورجینال', 'برتر', 'محبوب', 'پرفروش', 'ویژه', 'خاص', 'منحصربفرد',
        'قدرتمند', 'پرطرفدار', 'لوکس', 'اقتصادی', 'کاربردی', 'چندکاره',
        'سریع', 'کارآمد', 'مقاوم', 'سبک', 'قابل حمل', 'قابل تنظیم', 'انعطاف‌پذیر',
        'ارزان', 'مقرون به صرفه', 'گران‌قیمت', 'لاکچری', 'استاندارد', 'ایمن',
        'راحت', 'آسان', 'ساده', 'پیچیده', 'دقیق', 'ظریف', 'زیبا', 'شیک'
    );
    
    /**
     * Generate a Persian word
     *
     * @return string
     */
    public function persianWord() {
        return static::randomElement(static::$persianWords);
    }
    
    /**
     * Generate a Persian product
     *
     * @return string
     */
    public function persianProduct() {
        return static::randomElement(static::$persianProducts);
    }
    
    /**
     * Generate a Persian feature
     *
     * @return string
     */
    public function persianFeature() {
        return static::randomElement(static::$persianFeatures);
    }
    
    /**
     * Generate a Persian topic
     *
     * @return string
     */
    public function persianTopic() {
        return static::randomElement(static::$persianTopics);
    }
    
    /**
     * Generate a Persian adjective
     *
     * @return string
     */
    public function persianAdjective() {
        return static::randomElement(static::$persianAdjectives);
    }
    
    /**
     * Generate a Persian article title
     *
     * @return string
     */
    public function persianTitle($length = 4) {
        $pattern = static::randomElement(static::$persianTitlePatterns);
        $title = sprintf($pattern, $this->persianTopic());
        
        $words = explode(' ', $title);
        if (count($words) > $length) {
            $title = implode(' ', array_slice($words, 0, $length));
        }
        
        return $title;
    }
    
    /**
     * Generate a Persian product title
     *
     * @return string
     */
    public function persianProductTitle() {
        $pattern = static::randomElement(static::$persianProductTitlePatterns);
        
        // Generate a random code for the product model
        $model = strtoupper($this->lexify('??-???'));
        
        // Ensure that the correct number of arguments is passed
        $product = $this->persianProduct();
        $adjective = $this->persianAdjective();
        
        // Check the pattern and pass the correct number of arguments
        if (substr_count($pattern, '%s') === 3) {
            return sprintf($pattern, $product, $adjective, $model);
        } elseif (substr_count($pattern, '%s') === 2) {
            return sprintf($pattern, $product, $adjective);
        } else {
            return $product; // Fallback if pattern doesn't match
        }
    }
    
    /**
     * Generate a Persian sentence
     *
     * @return string
     */
    public function persianSentence() {
        $pattern = static::randomElement(static::$persianSentencePatterns);
        
        // Use meaningful word combinations
        if (strpos($pattern, '%s %s') !== false) {
            // For patterns that require combining product and adjective
            return sprintf($pattern, 
                $this->persianProduct(), 
                $this->persianAdjective()
            );
        } else {
            // For other patterns
            return sprintf($pattern, 
                $this->persianProduct(), 
                $this->persianFeature()
            );
        }
    }
    
    /**
     * Generate a Persian paragraph
     *
     * @param int $nbSentences Number of sentences
     * @return string
     */
    public function persianParagraph($nbSentences = 3) {
        // Sometimes use paragraph patterns
        if (mt_rand(0, 100) < 30) {
            $pattern = static::randomElement(static::$persianParagraphPatterns);
            return sprintf($pattern, 
                $this->persianProduct(), 
                $this->persianAdjective(),
                $this->persianFeature()
            );
        }
        
        // Otherwise, concatenate several sentences
        $sentences = array();
        for ($i = 0; $i < $nbSentences; $i++) {
            $sentences[] = $this->persianSentence();
        }
        return implode(' ', $sentences);
    }
    
    /**
     * Override the main Faker text method
     *
     * @param int $maxNbChars Maximum number of characters
     * @return string
     */
    public function text($maxNbChars = 200) {
        $text = $this->persianParagraph(3);
        return mb_substr($text, 0, $maxNbChars);
    }
    
    /**
     * Override the main Faker paragraph method
     *
     * @param int $nbSentences Number of sentences
     * @return string
     */
    public function paragraph($nbSentences = 3) {
        return $this->persianParagraph($nbSentences);
    }
    
    /**
     * Override the main Faker sentence method
     *
     * @param int $nbWords Number of words
     * @return string
     */
    public function sentence($nbWords = 6) {
        return $this->persianSentence();
    }
    
    /**
     * Get content category
     *
     * @param string $category Category key
     * @param string $locale Language (fa or en)
     * @return array Category information
     */
    public function getContentCategory($category = null, $locale = 'fa') {
        if ($category === null) {
            $category = array_rand(static::$contentCategories);
        }
        
        if (!isset(static::$contentCategories[$category])) {
            $category = array_rand(static::$contentCategories);
        }
        
        $categoryData = static::$contentCategories[$category];
        $lang = ($locale === 'fa_IR' || $locale === 'fa') ? 'fa' : 'en';
        
        return array(
            'key' => $category,
            'name' => $categoryData[$lang],
            'keywords' => $categoryData['keywords'][$lang]
        );
    }
    
    /**
     * Generate title based on content category
     *
     * @param string $category Content category
     * @param string $locale Language
     * @return string
     */
    public function titleByCategory($category, $locale = 'fa_IR') {
        $categoryData = $this->getContentCategory($category, $locale);
        $keywords = $categoryData['keywords'];
        
        if ($locale === 'fa_IR' || $locale === 'fa') {
            $pattern = static::randomElement(static::$persianTitlePatterns);
            $keyword = static::randomElement($keywords);
            return sprintf($pattern, $keyword);
        } else {
            return 'The Ultimate Guide to ' . static::randomElement($keywords);
        }
    }
    
    /**
     * Generate product title based on content category
     *
     * @param string $category Content category
     * @param string $locale Language
     * @return string
     */
    public function productTitleByCategory($category, $locale = 'fa_IR') {
        $categoryData = $this->getContentCategory($category, $locale);
        $keywords = $categoryData['keywords'];
        
        if ($locale === 'fa_IR' || $locale === 'fa') {
            $pattern = static::randomElement(static::$persianProductTitlePatterns);
            $model = strtoupper($this->lexify('??-???'));
            
            $title = sprintf($pattern, 
                static::randomElement($keywords), 
                $this->persianAdjective(),
                $model
            );
            return $title;
        } else {
            return static::randomElement($keywords) . ' ' . $this->word . ' Model ' . strtoupper($this->lexify('??##'));
        }
    }
} 