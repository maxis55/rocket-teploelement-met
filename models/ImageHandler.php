<?php

namespace app\models;

class ImageHandler
{
    
    // configuration constants
    const CACHE_LOCATION = 'cache/'; // path to cache folder
    const IMAGES_LOCATION = 'media/'; // path to images storage folder
    const ACTIVATE_LOG = false; // activate logging events
    const LOG_FILE = 'log.txt'; // path to log file
    
    // log constants
    const EMERGENCY = 'emergency';
    const ALERT = 'alert';
    const CRITICAL = 'critical';
    const ERROR = 'error';
    const WARNING = 'warning';
    const NOTICE = 'notice';
    const INFO = 'info';
    const DEBUG = 'debug';
    
    // object settings variables
    protected $crop_x, $crop_y, $crop_width, $crop_height, $width, $height, $format, $jpeg_quality, $flip, $grayscale, $brightness, $contrast, $edges, $emboss, $reverse, $opacity, $rotate, $background_color, $stamp, $stamp_position, $stamp_size, $stamp_indent_horizontal, $stamp_indent_vertical, $text, $text_position, $text_font, $text_size, $text_color, $text_indent_horizontal, $text_indent_vertical, $frame, $order, $cache_combination, $cache_name;
    
    
    
    // configuration image settings
    function __construct($args = false)
    {
        // checking software versions
        if (version_compare(phpversion(), '5.5', '<'))
        {
            echo 'Minimum PHP version for ImageHandler is 5.5';
            die;
        }
        
        // setup variables
        // cropping variables
        $this->crop_x = $args['crop_x'] = ( isset($args['crop_x']) ? ((int) $args['crop_x']) : 0 );

        $this->crop_y = $args['crop_y'] = ( isset($args['crop_y']) ? ((int) $args['crop_y']) : 0 );
        
        $this->crop_width = $args['crop_width'] = ( isset($args['crop_width']) ? ((int) $args['crop_width']) : null );
        
        $this->crop_height = $args['crop_height'] = ( isset($args['crop_height']) ? ((int) $args['crop_height']) : null );

        // canvas size variables
        if (isset($args['width']))
        {
            if ($args['width'] != 'auto') $args['width'] = (int) $args['width'];
            $this->width = $args['width'] = $args['width'];
        }
        else
            $this->width = $args['width'] = 200;
        
        if (isset($args['height']))
        {
            if ($args['height'] != 'auto') $args['height'] = (int) $args['height'];
            $this->height = $args['height'] = $args['height'];
        }
        else
            $this->height = $args['height'] = 200;
        
        // output format variable
        if (isset($args['format']) && ($args['format'] == 'png' || $args['format'] == 'jpg'))
            $this->format = $args['format'] = $args['format'];
        else
            $this->format = $args['format'] = 'png';
        
        // JPEG quality variable
        if (isset($args['jpeg_quality']) && $args['jpeg_quality'] > 0 && $args['jpeg_quality'] <= 100)
            $this->jpeg_quality = $args['jpeg_quality'] = (int) $args['jpeg_quality'];
        else
            $this->jpeg_quality = $args['jpeg_quality'] = 100;
        
        // grayscale variable
        $this->grayscale = $args['grayscale'] = ( isset($args['grayscale']) ? boolval($args['grayscale']) : false );
        
        // brightness variable
        $this->brightness = $args['brightness'] = ( isset($args['brightness']) ? ((int) $args['brightness']) : false );
        
        // contrast variable
        $this->contrast = $args['contrast'] = ( isset($args['contrast']) ? ((int) $args['contrast']) : false );
        
        // edges variable
        $this->edges = $args['edges'] = ( isset($args['edges']) ? boolval($args['edges']) : false );
        
        // emboss variable
        $this->emboss = $args['emboss'] = ( isset($args['emboss']) ? boolval($args['emboss']) : false );
        
        // reverse variable
        $this->reverse = $args['reverse'] = ( isset($args['reverse']) ? boolval($args['reverse']) : false );
        
        // opacity variable
        $this->opacity = $args['opacity'] = ( isset($args['opacity']) ? ((int) $args['opacity'] / 100) : null );
        
        // flipping variable
        if (isset($args['flip']) && ($args['flip'] == 'vertical' || $args['flip'] == 'horizontal' || $args['flip'] == 'both'))
            $this->flip = $args['flip'] = $args['flip'];
        else
            $this->flip = $args['flip'] = null;
        
        // rotation variable
        $this->rotate = $args['rotate'] = ( isset($args['rotate']) ? ((int) $args['rotate']) : null );
        
        // frame variable
        $this->frame = $args['frame'] = ( isset($args['frame']) ? strip_tags($args['frame']) : null );
        
        // stamp variables
        $this->stamp = $args['stamp'] = ( isset($args['stamp']) ? strip_tags($args['stamp']) : null );
        
        $this->stamp_position = $args['stamp_position'] = ( isset($args['stamp_position']) ? strip_tags($args['stamp_position']) : 'bottom-right' );
        
        $this->stamp_size = $args['stamp_size'] = ( isset($args['stamp_size']) ? ((int) $args['stamp_size']) : 5 );

        $this->stamp_opacity = $args['stamp_opacity'] = ( isset($args['stamp_opacity']) ? ((int) $args['stamp_opacity'] / 100) : null );
        
        $this->stamp_indent_horizontal = $args['stamp_indent_horizontal'] = ( isset($args['stamp_indent_horizontal']) ? ((int) $args['stamp_indent_horizontal']) : 10 );
        
        $this->stamp_indent_vertical = $args['stamp_indent_vertical'] = ( isset($args['stamp_indent_vertical']) ? ((int) $args['stamp_indent_vertical']) : 10 );
        
        // background color variables
        if (isset($args['background_color']))
        {
            $val = strtolower(str_replace('#', '', strip_tags($args['background_color'])));
            if (strlen(utf8_decode($val)) != 6)
            {
                $val = substr($val, 0, 3);
                $val = $val[0] . $val[0] . $val[1] . $val[1] . $val[2] . $val[2];
            }
        }
        else
            $val = '';
        $this->background_color = $args['background_color'] = $val;
        
        // text variables
        $this->text = $args['text'] = ( isset($args['text']) ? strip_tags($args['text']) : null );
        
        $this->text_position = $args['text_position'] = ( isset($args['text_position']) ? strip_tags($args['text_position']) : 'bottom-left' );
        
        $this->text_font = $args['text_font'] = ( isset($args['text_font']) ? strip_tags($args['text_font']) : null );
        
        $this->text_size = $args['text_size'] = ( isset($args['text_size']) ? strip_tags($args['text_size']) : 14 );
        
        $this->text_rotate = $args['text_rotate'] = ( isset($args['text_rotate']) ? strip_tags($args['text_rotate']) : 0 );
        
        if (isset($args['text_color']))
        {
            $val = strtolower(str_replace('#', '', strip_tags($args['text_color'])));
            if (strlen(utf8_decode($val)) != 6)
            {
                $val = substr($val, 0, 3);
                $val = $val[0] . $val[0] . $val[1] . $val[1] . $val[2] . $val[2];
            }
        }
        else
            $val = 'ffffff';
        $this->text_color = $args['text_color'] = $val;
        
        $this->text_indent_horizontal = $args['text_indent_horizontal'] = ( isset($args['text_indent_horizontal']) ? strip_tags($args['text_indent_horizontal']) : 10 );
        
        $this->text_indent_vertical = $args['text_indent_vertical'] = ( isset($args['text_indent_vertical']) ? strip_tags($args['text_indent_vertical']) : 10 );
        
        // effects order variables
        $default_order = [ "grayscale", "brightness", "contrast", "edges", "emboss", "reverse", "opacity", "rotate", "flip", "stamp", "text", "frame" ];
        if (isset($args['order']) && empty(array_diff($default_order, $args['order'])) && (count($default_order) == count($args['order'])))
            $val = $args['order'];
        else
            $val = $default_order;
        $this->order = $args['order'] = $val;
        
        // building cache combination
        $this->cache_combination  = md5( json_encode($args) );
        
        // locations checkup
        if (!file_exists(self::CACHE_LOCATION))
        {
            self::log('Cache folder was not found. Location was created', self::NOTICE);
            mkdir(self::CACHE_LOCATION);
        }
        if (!file_exists(self::IMAGES_LOCATION))
        {
            self::log('Images folder was not found. Location was created', self::NOTICE);
            mkdir(self::IMAGES_LOCATION);
        }
    }
    
    
    
    // image uploading
    public function handleImage($name, $type, $tmp_location)
    {
        // check variables
        $name = strip_tags($name);
        $tmp_location = strip_tags($tmp_location);
        
        // check allowed type
        if ($type == 'image/jpeg' || $type == 'image/png')
        {
            
            // file uploading
            if (move_uploaded_file($tmp_location, self::IMAGES_LOCATION . $name))
            {
                self::log('File ' . $name . ' uploaded');
                return true;
            }
            else{
                self::log('File ' . $name . ' upload error', self::ERROR);
                require false;
            }
            
        }
        else{
            self::log('Wrong type of file ' . $name, self::ERROR);
            return fasle;
        }
    }
    
    
    
    // output image html code
    public function showImage($name, $attributes = null)
    {
        // check for url
        $url = false;
        if (strpos($name, '/') !== false) $url = true;

        // check variables
        $name = strip_tags($name);
        if(!$url) $name = self::IMAGES_LOCATION . $name;
        
        // start editing
        $image_file = $this->editImage($name);
        
        // jpeg format
        $jpg = '';
        if ($this->format && $this->format == 'jpg')
            $jpg = '.jpg';
        
        // building view
        self::log('Displaying image ' . $name);
        $attributes_str = '';
        if($attributes) foreach ($attributes as $attribute => $value) $attributes_str .= $attribute.'="' . str_replace('"', "'", $value) . '" ';
        return '<img src="' . self::CACHE_LOCATION . $image_file . $jpg . '" width="' . $this->width . '" height="' . $this->height . '" ' .$attributes_str. '>';
    }
    
    
    
    // output image url
    public function showLink($name)
    {
        // check for url
        $url = false;
        if (strpos($name, '/') !== false) $url = true;

        // check variables
        $name = strip_tags($name);
        if(!$url) $name = self::IMAGES_LOCATION . $name;
        
        // start editing
        $image_file = $this->editImage($name);
        
        // jpeg format
        $jpg = '';
        if ($this->format && $this->format == 'jpg')
            $jpg = '.jpg';
        
        // building view
        self::log('Displaying image ' . $name);
        return self::CACHE_LOCATION . $image_file . $jpg;
    }
    
    
    
    // main editing image function
    protected function editImage($name)
    {
        // defining cache name
        $this->cache_name = $this->cache_combination . str_replace("/", "-", $name);
        
        // if image not in cache creating image cache
        if (!file_exists(self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('No image in cache, image rendered ', self::DEBUG);
            
            // checking if source image exist
            $source_exist = file_exists($name);
            if ($source_exist)
            {
                
                // building base canvas
                $this->canvasSize($name);
                        
                // putting background color
                if ($this->background_color)
                    $this->backgroundColor();

                // running effects by order
                foreach ($this->order as $call)
                    if ($this->$call && $this->$call !== null)
                        $this->$call();
                
                // converting image to jpeg format
                if ($this->format && $this->format == 'jpg')
                    $this->convertToJpeg();
                
            }
            else
                self::log('Requested not existing image ' . $name, self::ERROR);
            
        }
        else
            self::log('Image taken from cache ', self::DEBUG);
        
        return $this->cache_name;
    }
    
    
    
    // applying main image to canvas dimensions
    protected function canvasSize($name)
    {

        // defining image dimensions
        $rest = substr($name, -3);
        if ($rest == 'png' || $rest == 'PNG')
            $source_image = imagecreatefrompng($name);
        else
            $source_image = imagecreatefromjpeg($name);
        if ($this->crop_width !== null && $this->crop_height !== null) // cropping
        {
            $source_image = imagecrop($source_image, ['x' => $this->crop_x, 'y' => $this->crop_y, 'width' => $this->crop_width, 'height' => $this->crop_height]);
            self::log('Cropping image ' . $name);
        }
        $width  = imagesx($source_image);
        $height = imagesy($source_image);

        // checking auto dimensions
        if( $this->height == 'auto' && $this->width == 'auto' )
        {
            $this->width  = imagesx($source_image);
            $this->height = imagesy($source_image);
        }
        else
        {
            if ($this->height == 'auto')
                $this->height = (int) ($this->width / ($width / $height));
            else if ($this->width == 'auto')
                $this->width = (int) ($this->height * ($width / $height));
        }
        
        // defining new image sizes
        $zoom_1 = $this->height / $height;
        $zoom_2 = $this->width / $width;
        if ($zoom_1 > $zoom_2)
            $zoom = $zoom_1;
        else
            $zoom = $zoom_2;
        $v_width  = floor($width * $zoom);
        $v_height = floor($height * $zoom);
        
        // creating virtual crop
        $virtual_image = imagecreatetruecolor($this->width, $this->height);
        imagecolortransparent($virtual_image, imagecolorallocate($virtual_image, 0, 0, 0));
        imagealphablending($virtual_image, false);
        imagesavealpha($virtual_image, true);
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $v_width, $v_height, $width, $height);
        
        // creating temporal thumb
        imagepng($virtual_image, self::CACHE_LOCATION . $this->cache_name);
        imagedestroy($virtual_image);
        
        // applying image resize
        $source_image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        $width        = imagesx($source_image);
        $height       = imagesy($source_image);
        $swipew       = $swipeh = 0;
        if ($width > $this->width)
            $swipew = ($width - $this->width) / 2;
        if ($height > $this->height)
            $swipeh = ($height - $this->height) / 2;
        $to_crop_array = array(
            'x' => $swipew,
            'y' => $swipeh,
            'width' => $this->width,
            'height' => $this->height
        );
        $cache_image   = imagecrop($source_image, $to_crop_array);
        imagedestroy($source_image);
        
        // saving results
        if (imagepng($cache_image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Cache created of image ' . $name);
            return true;
        }
        else
        {
            self::log('Cache creating error on image ' . $name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // placing background color under image
    protected function backgroundColor()
    {
        
        // reading original image
        $photo = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        $photo_width = imagesx($photo);
        $photo_height = imagesy($photo);
        
        // creating fill
        $virtual_image = imagecreatetruecolor($photo_width, $photo_height);
        $color = imagecolorallocate($virtual_image, hexdec(substr($this->background_color, 0, 2)), hexdec(substr($this->background_color, 2, 2)), hexdec(substr($this->background_color, 4, 2)));
        imagefill($virtual_image, 0, 0, $color);
        imagecopyresampled($virtual_image, $photo, 0, 0, 0, 0, $photo_width, $photo_height, $photo_width, $photo_height);
        
        // cleaning temporal files
        imagedestroy($photo);
        
        // saving results
        if (imagepng($virtual_image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Background color #' . $color . ' placed under image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Placing background color error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // flipping image
    protected function flip()
    {
        
        // reading dimentions
        $imgsrc     = self::CACHE_LOCATION . $this->cache_name;
        $photo      = imagecreatefrompng($imgsrc);
        $src_width  = $width = imagesx($photo);
        $src_height = $height = imagesy($photo);
        $src_x      = $src_y = 0;
        
        // calculating dimentions
        switch ($this->flip)
        {
            
            case 'vertical':
                $src_y      = $height - 1;
                $src_height = -$height;
                break;
            
            case 'horizontal':
                $src_x     = $width - 1;
                $src_width = -$width;
                break;
            
            case 'both':
                $src_x      = $width - 1;
                $src_y      = $height - 1;
                $src_width  = -$width;
                $src_height = -$height;
                break;
            
            default:
                self::log('Flipping image error, wring mode, image ' . $this->cache_name, self::ERROR);
                return false;
                
        }
        
        // rendering image
        $virtual_image = imagecreatetruecolor($width, $height);
        imagealphablending($virtual_image, false);
        imagesavealpha($virtual_image, true);
        imagecopyresampled($virtual_image, $photo, 0, 0, $src_x, $src_y, $width, $height, $src_width, $src_height);
        
        // cleaning temporal files
        imagedestroy($photo);
        
        // saving results
        if (imagepng($virtual_image, $imgsrc))
        {
            self::log('Flipping image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Flipping image error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // make image transparent
    protected function opacity()
    {
        
        // collecting data
        $transparency = 1 - $this->opacity;
        $image        = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 0, 127 * $transparency);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Making transparent image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Making image transparent error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // rotate image
    protected function rotate()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        $transparency = imagecolorallocatealpha($image, 0, 0, 0, 127);
        $image        = imagerotate($image, $this->rotate, $transparency);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Rotating image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Rotating image error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // grayscale image
    protected function grayscale()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_GRAYSCALE);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Grayscale image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Grayscale image error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
    }
        
    
    
    
    // correct image brightness
    protected function brightness()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_BRIGHTNESS, $this->brightness);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Brightness image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Brightness image error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
        
    
    
    
    // correct image contrast
    protected function contrast()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_CONTRAST, $this->contrast);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Contrast image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Contrast image error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
        
    
    
    
    // image edges
    protected function edges()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_EDGEDETECT);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Image edges' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Image edges error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
        
    
    
    
    // image colors reverse
    protected function reverse()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_NEGATE);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Reverse image colors ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Reverse image colors error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
        
    
    
    
    // emboss image
    protected function emboss()
    {
        
        // collecting data
        $image = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        imagealphablending($image, false);
        imagesavealpha($image, true);
        
        // rendering
        imagefilter($image, IMG_FILTER_EMBOSS);
        
        // saving results
        if (imagepng($image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Emboss image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Emboss image error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // placing stamp on image
    protected function stamp()
    {
        
        // checking if stamp image exist
        $source_exist = file_exists(self::IMAGES_LOCATION . $this->stamp);
        if ($source_exist)
        {
            
            // loading stamp and image
            $rest = substr($this->stamp, -3);
            if ($rest == 'png' || $rest == 'PNG')
                $stamp = imagecreatefrompng(self::IMAGES_LOCATION . $this->stamp);
            else
                $stamp = imagecreatefromjpeg(self::IMAGES_LOCATION . $this->stamp);
            $photo = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        
            // transparency
            imagealphablending($stamp, false);
            imagesavealpha($stamp, true);
            imagefilter($stamp, IMG_FILTER_COLORIZE, 0, 0, 0, 127 * $this->stamp_opacity);
            
            // calculating sizes
            $stamp_width      = imagesx($stamp);
            $stamp_height     = imagesy($stamp);
            $photo_width      = imagesx($photo);
            $photo_height     = imagesy($photo);
            $stamp_width_new  = ($photo_width / 100) * $this->stamp_size;
            $stamp_height_new = ($stamp_width_new / $stamp_width) * $stamp_height;
            
            // calculating indents
            $left_indent = $this->stamp_indent_horizontal;
            $top_indent  = $this->stamp_indent_vertical;
            if (strripos($this->stamp_position, 'right') !== false)
                $left_indent = $photo_width - $stamp_width_new - $this->stamp_indent_horizontal;
            if (strripos($this->stamp_position, 'bottom') !== false)
                $top_indent = $photo_height - $stamp_height_new - $this->stamp_indent_vertical;
            
            // generating image
            $virtual_image = imagecreatetruecolor($photo_width, $photo_height);
            imagecolortransparent($virtual_image, imagecolorallocate($virtual_image, 0, 0, 0));
            imagealphablending($virtual_image, false);
            imagesavealpha($virtual_image, true);
            imagecopyresampled($virtual_image, $photo, 0, 0, 0, 0, $photo_width, $photo_height, $photo_width, $photo_height);
            imagealphablending($virtual_image, true);
            imagecopyresampled($virtual_image, $stamp, $left_indent, $top_indent, 0, 0, $stamp_width_new, $stamp_height_new, $stamp_width, $stamp_height);
            
            // cleaning temporal files
            imagedestroy($stamp);
            imagedestroy($photo);
            
            // saving results
            if (imagepng($virtual_image, self::CACHE_LOCATION . $this->cache_name))
            {
                self::log('Stamp placed on image ' . $this->cache_name);
                return true;
            }
            else
            {
                self::log('Placing stamp error, image ' . $this->cache_name, self::ERROR);
                return false;
            }
            
        }
        else
        {
            self::log('Requested not existing stamp ' . $name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // placing text on the image
    protected function text()
    {
        
        // font checkup
        if (!file_exists($this->text_font))
        {
            self::log('Font was not found, address: ' . $this->text_font, self::ERROR);
            return false;
        }
        
        // reading original image
        $photo        = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        $photo_width  = imagesx($photo);
        $photo_height = imagesy($photo);
        $text_width   = $this->text_size * mb_strlen($this->text);
        
        // calculating indents
        $left_indent = $this->text_indent_horizontal;
        $top_indent  = $this->text_indent_vertical;
        if (strripos($this->text_position, 'right') !== false)
            $left_indent = $photo_width - $text_width - $this->text_indent_horizontal;
        if (strripos($this->text_position, 'bottom') !== false)
            $top_indent = $photo_height - $this->text_size - $this->text_indent_vertical;
        
        // creating text
        $virtual_image = imagecreatetruecolor ($photo_width, $photo_height);
        imagecolortransparent($virtual_image, imagecolorallocate($virtual_image, 0, 0, 0));
        imagealphablending($virtual_image, false);
        imagesavealpha($virtual_image, true);
        imagecopyresampled ($virtual_image, $photo, 0, 0, 0, 0, $photo_width, $photo_height, $photo_width, $photo_height);
        imagealphablending($virtual_image, true);
        $color = imagecolorallocate($virtual_image, hexdec(substr($this->text_color, 0, 2)), hexdec(substr($this->text_color, 2, 2)), hexdec(substr($this->text_color, 4, 2)));
        imagettftext($virtual_image, $this->text_size, $this->text_rotate, $left_indent, $top_indent, $color, $this->text_font, $this->text);
 
        
        // cleaning temporal files
        imagedestroy($photo);
        
        // saving results
        if (imagepng($virtual_image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Background color #' . $color . ' placed under image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Placing background color error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // placing background color under image
    protected function frame()
    {
        
        // checking frame image
        if (!file_exists(self::IMAGES_LOCATION . $this->frame))
        {
            self::log('Frame image not exists, frame ' . $this->frame, self::ERROR);
            return false;
        }
        
        // reading original image
        $photo        = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        $photo_width  = imagesx($photo);
        $photo_height = imagesy($photo);
        $rest = substr($this->frame, -3);
        if ($rest == 'png' || $rest == 'PNG')
            $frame = imagecreatefrompng(self::IMAGES_LOCATION . $this->frame);
        else
            $frame = imagecreatefromjpeg(self::IMAGES_LOCATION . $this->frame);
        $frame_width  = imagesx($frame);
        $frame_height = imagesy($frame);
        
        // creating fill
        $virtual_image = imagecreatetruecolor($photo_width, $photo_height);
        imagealphablending($virtual_image, false);
        imagesavealpha($virtual_image, true);
        imagecopyresampled($virtual_image, $photo, 0, 0, 0, 0, $photo_width, $photo_height, $photo_width, $photo_height);
        imagealphablending($virtual_image, true);
        imagecopyresampled($virtual_image, $frame, 0, 0, 0, 0, $photo_width, $photo_height, $frame_width, $frame_height);
        
        // cleaning temporal files
        imagedestroy($photo);
        imagedestroy($frame);
        
        // saving results
        if (imagepng($virtual_image, self::CACHE_LOCATION . $this->cache_name))
        {
            self::log('Frame placed on image ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Placing frame error, frame ' . $this->frame, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // converting image to jpeg format
    public function convertToJpeg()
    {
        
        // reading original image
        $photo        = imagecreatefrompng(self::CACHE_LOCATION . $this->cache_name);
        $photo_width  = imagesx($photo);
        $photo_height = imagesy($photo);
        
        // creating fill
        $virtual_image = imagecreatetruecolor($photo_width, $photo_height);
        imagecopyresampled($virtual_image, $photo, 0, 0, 0, 0, $photo_width, $photo_height, $photo_width, $photo_height);
        
        // cleaning temporal files
        imagedestroy($photo);
        unlink(self::CACHE_LOCATION . $this->cache_name);
        
        // saving results
        if (imagejpeg($virtual_image, self::CACHE_LOCATION . $this->cache_name . '.jpg', $this->jpeg_quality))
        {
            self::log('Image coverted to JPEG ' . $this->cache_name);
            return true;
        }
        else
        {
            self::log('Image converting error, image ' . $this->cache_name, self::ERROR);
            return false;
        }
        
    }
    
    
    
    // display list of uploaded images
    public static function showImagesList($class = '')
    {
        // reading folder content
        $files = scandir(self::IMAGES_LOCATION, 1);
        
        // building list view
        if (count($files) > 2)
        {
            $str = '<table class="' . $class . '">';
            $str .= '<tr>';
            $str .= '<td>Image</td>';
            $str .= '<td>Name</td>';
            $str .= '<td>Weight</td>';
            $str .= '<td>Size</td>';
            $str .= '</tr>';
            foreach ($files as $file)
                if ($file != '.' && $file != '..')
                {
                    $size = getimagesize(self::IMAGES_LOCATION . $file);
                    $str .= '<tr>';
                    $str .= '<td><img src="' . self::IMAGES_LOCATION . $file . '" style="max-width: 100px; max-height: 100px;"></td>';
                    $str .= '<td>' . $file . '</td>';
                    $str .= '<td>' . filesize(self::IMAGES_LOCATION . $file) . ' B.</td>';
                    $str .= '<td>' . $size[0] . 'x' . $size[1] . ' px.</td>';
                    $str .= '</tr>';
                }
            $str .= '</table>';
        }
        else
            $str = '<p>Images folder is empty</p>';
        
        self::log('Displaying list of uploaded images');
        return $str;
    }
    
    
    
    // display list of cache images
    public static function showCacheList($class = '')
    {
        // reading folder content
        $files = scandir(self::CACHE_LOCATION, 1);
        
        // building list view
        if (count($files) > 2)
        {
            $str = '<table class="' . $class . '">';
            $str .= '<tr>';
            $str .= '<td>Image</td>';
            $str .= '<td>Size</td>';
            $str .= '</tr>';
            foreach ($files as $file)
                if ($file != '.' && $file != '..')
                {
                    $size = getimagesize(self::CACHE_LOCATION . $file);
                    $str .= '<tr>';
                    $str .= '<td><img src="' . self::CACHE_LOCATION . $file . '" style="max-width: 100px; max-height: 100px;"></td>';
                    $str .= '<td>' . $size[0] . 'x' . $size[1] . ' px.</td>';
                    $str .= '</tr>';
                }
            $str .= '</table>';
        }
        else
            $str = '<p>Cache folder is empty</p>';
        
        self::log('Displaying list of cache images');
        return $str;
    }
    
    
    
    // clean cache
    public static function deleteCache()
    {
        $files = scandir(self::CACHE_LOCATION, 1);
        array_pop($files);
        array_pop($files);
        foreach ($files as $file)
            unlink(self::CACHE_LOCATION . $file);
        
        self::log('Cache was deleted', self::NOTICE);
    }
    
    
    
    // logging function
    protected static function log($message, $level = self::INFO)
    {
        if (self::ACTIVATE_LOG)
        {
            $log = @file_get_contents(self::LOG_FILE);
            $log .= $level . ' ' . date("l dS F Y h:i:s A") . ' : ' . $message . "\n";
            file_put_contents(self::LOG_FILE, $log);
        }
    }
    
    
    
    // display log events in list
    public static function showLog($class = '')
    {
        self::log('Displaying list of log events');
        
        $str = '<ol class="' . $class . '">';
        $log = fopen(self::LOG_FILE, "r");
        while (!feof($log))
        {
            $event = fgets($log, 4096);
            if (!empty($event))
                $str .= '<li>' . $event . '</li>';
        }
        fclose($log);
        $str .= '</ol>';
        
        self::log('Log events list was displayed');
        return $str;
    }
    
    
    
    // cleaning log file
    public static function deleteLog()
    {
        unlink(self::LOG_FILE);
        self::log('Log was cleaned', self::NOTICE);
    }
    
}