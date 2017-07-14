<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\behaviours;

/**
 * Description of DateFormatter
 *
 * @author Pawel
 */
class DateFormatter implements DateDisplayConverter {

    protected $converter;
    protected $formats;

    public function __construct() {
        $this->converter = new \DateTime();
        $this->setFormats();
        
    }

    protected function setFormats(array $formats = []) {
        $this->formats = [
            'timestamp' => time(),
        ];
        $this->formats = array_merge($this->formats, $formats);
    }

    public function format($value, $format) {
        if (is_int($value)) {
            $this->converter->setTimestamp($value);
        }
        return $this->interpretFormats($format);
    }

    public function interpretFormats($format) {


        if (isset($this->formats[$format])) {
            return $this->formats[$format];
        }
        return $this->converter->format($format);
    }

}
