<?php

namespace swishdigital\craftsecuricacheclear;

use Craft;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Utilities;
use swishdigital\craftsecuricacheclear\models\Settings;
use swishdigital\craftsecuricacheclear\services\Api;
use swishdigital\craftsecuricacheclear\utilities\PurgeUtility;
use yii\base\Event;

/**
 * Securi Cache Clear plugin
 *
 * @method static Securi getInstance()
 * @method Settings getSettings()
 * @author Swish Digital <info@swishdigital.co>
 * @copyright Swish Digital
 * @license MIT
 * @property-read Api $api
 */
class Securi extends BasePlugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;
    public static Securi $plugin;

    public static function config(): array
    {
        return [
            'components' => ['api' => Api::class],
        ];
    }

    public function init(): void
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('securi-cache-clear/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)
        Event::on(Utilities::class, Utilities::EVENT_REGISTER_UTILITY_TYPES, function (RegisterComponentTypesEvent $event) {
            $event->types[] = PurgeUtility::class;
        });
    }
}
