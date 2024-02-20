<?php

namespace swishdigital\craftsecuricacheclear\models;

use Craft;
use craft\base\Model;

/**
 * Settings model
 */
class Settings extends Model
{

    public $apiKey = '';
    public $apiSecret = '';

    protected function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            [['apiKey', 'apiSecret'], 'required'],
            // ...
        ]);
    }
}
