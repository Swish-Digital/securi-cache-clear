<?php

namespace swishdigital\craftsecuricacheclear\assets;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class SecuriAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init(): void
    {
        $this->sourcePath = "@swishdigital/craftsecuricacheclear/resources";

        $this->depends = [ CpAsset::class ];
        $this->js = [ 'js/cp.js' ];
        $this->css = [ 'css/cp.css' ];

        parent::init();
    }
}
