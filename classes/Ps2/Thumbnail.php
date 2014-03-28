<?php

class Ps2_Thumbnail
{
    protected $_original;
    protected $_originalwidth;
    protected $_originalheight;
    protected $_thumbwidth;
    protected $_thumbheight;
    protected $_maxSize = 120;
    protected $_canProcess = false;
    protected $_imageType;
    protected $_destination;
    protected $_name;
    protected $_suffix = '_thb';
    protected $_messages = array();

    public function __construct($image)
    {
        if (is_file($image) && is_readable($image)) {
            $details = getimagesize($image);
        } else {
            $details = null;
            $this->_messages[] = "Cannot open $image.";
        }
        // if getimagesize() returns an array, it looks like an image
        if (is_array($details)) {
            $this->_original = $image;
            $this->_originalwidth = $details[0];
            $this->_originalheight = $details[1];
            // check the MIME type
            $this->checkType($details['mime']);
        } else {
            $this->_messages[] = "$image doesn't appear to be an image.";
        }
    }

    protected function checkType($mime)
    {
        $mimetypes = array('image/jpeg', 'image/png', 'image/gif');
        if (in_array($mime, $mimetypes)) {
            $this->_canProcess = true;
            // extract the characters after 'image/'
            $this->_imageType = substr($mime, 6);
        }
    }

    public function setDestination($destination)
    {
        if (is_dir($destination) && is_writable($destination)) {
            // get last character
            $last = substr($destination, -1);
            // add a trailing slash if missing
            if ($last == '/' || $last == '\\') {
                $this->_destination = $destination;
            } else {
                $this->_destination = $destination . DIRECTORY_SEPARATOR;
            }
        } else {
            $this->_messages[] = "Cannot write to $destination.";
        }
    }

    public function setMaxSize($size) {
        if (is_numeric($size) && $size>0) {
            $this->_maxSize = $size;
        } else {
            $this->_message[] = 'The value for setMaxSize() must be a positive number.';
            $this->_canProcess = false;
        }
    }

    public function setSuffix($suffix)
    {
        if (preg_match('/^\w+$/', $suffix)) {
            if (strpos($suffix, '_') !== 0) {
                $this->_suffix = '_' . $suffix;
            } else {
                $this->_suffix = $suffix;
            }
        } else {
            $this->_suffix = '';
        }
    }

    public function test()
    {
        echo 'File: ' . $this->_original . '<br>';
        echo 'Original width: ' . $this->_originalwidth . '<br>';
        echo 'Original height: ' . $this->_originalheight . '<br>';
        echo 'Image type: ' . $this->_imageType . '<br>';
        echo 'Destination: ' . $this->_destination . '<br>';
        echo 'Max size: ' . $this->_maxSize . '<br>';
        echo 'Suffix: ' . $this->_suffix . '<br>';
        if ($this->_messages) {
            print_r($this->_messages);
        }
    }
}