<?php

namespace swishdigital\craftsecuricacheclear\utilities;

use Craft;
use craft\base\Utility;
use swishdigital\craftsecuricacheclear\Securi;

/**
 * Purge Utility utility
 */
class PurgeUtility extends Utility
{
    public static function displayName(): string
    {
        return Craft::t('securi-cache-clear', 'Securi Cache Purge');
    }

    static function id(): string
    {
        return 'securi-purge-utility';
    }

    public static function iconPath(): ?string
    {
        return Craft::getAlias("@swishdigital/craftsecuricacheclear/resources/images/logo.svg");
    }

    static function contentHtml(): string
    {
        return Craft::$app->getView()->renderTemplate('securi-cache-clear/_utility.twig');
    }
}
