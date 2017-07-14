<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\behaviours;

/**
 * Description of DateConverter
 *
 * @author Pawel
 */
class DateConverter extends \yii\base\Behavior {

    const DISPLAY_FORMAT = 'display_format';
    const SAVE_FORMAT = 'save_format';

    public $dateAttributes = [];
                               
    public $converter;

    public function init() {
        parent::init();
        $this->converter();
    }

    protected function converter() {
        $this->converter = new DateFormatter();
    }

    public function events() {
        return [
            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'convertForSave',
            \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => 'convertForSave',
            \yii\db\ActiveRecord::EVENT_AFTER_FIND => 'convertForDisplay',
        ];
    }

    public function convertForDisplay() {

        foreach ($this->dateAttributes as $attribute => $settings) {
         
            $this->owner->{$attribute} = $this->converter->format($this->owner->{$attribute}, $settings[DateConverter::DISPLAY_FORMAT]);
        }
    }

    public function convertForSave() {

        foreach ($this->dateAttributes as $attribute => $settings) {
            $this->owner->{$attribute} = $this->converter->format($this->owner->{$attribute}, $settings[DateConverter::SAVE_FORMAT]);
        }
    }

}
