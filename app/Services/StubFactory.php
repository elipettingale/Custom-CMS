<?php

namespace App\Services;

use EliPett\CodeGeneration\Structs\Stub;

class StubFactory
{
    public static function adminResourceController(): Stub
    {
        return new Stub(
            'controller/admin-resource-controller.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Http/Controllers/Admin',
            '$ENTITY_UPPER_CAMEL_CASE$Controller.php'
        );
    }

    public static function controller(): Stub
    {
        return new Stub(
            'controller/controller.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Http/Controllers/$DIRECTORY_UPPER_CAMEL_CASE$',
            '$CONTROLLER_NAME_UPPER_CAMEL_CASE$Controller.php'
        );
    }

    public static function adminStoreRequest(): Stub
    {
        return new Stub(
            'request/admin-store-request.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Http/Requests/Admin/$ENTITY_UPPER_CAMEL_CASE$',
            'Store$ENTITY_UPPER_CAMEL_CASE$Request.php'
        );
    }

    public static function adminUpdateRequest(): Stub
    {
        return new Stub(
            'request/admin-update-request.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Http/Requests/Admin/$ENTITY_UPPER_CAMEL_CASE$',
            'Update$ENTITY_UPPER_CAMEL_CASE$Request.php'
        );
    }

    public static function repositoryInterface(): Stub
    {
        return new Stub(
            'repository/repository-interface.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Repositories',
            '$ENTITY_UPPER_CAMEL_CASE$Repository.php'
        );
    }

    public static function eloquentRepository(): Stub
    {
        return new Stub(
            'repository/eloquent-repository.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Repositories/Eloquent',
            'Eloquent$ENTITY_UPPER_CAMEL_CASE$Repository.php'
        );
    }

    public static function entityWithPresenter(): Stub
    {
        return new Stub(
            'entity/entity-with-presenter.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Entities',
            '$ENTITY_UPPER_CAMEL_CASE$.php'
        );
    }

    public static function presenter(): Stub
    {
        return new Stub(
            'entity/presenter.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Presenters',
            '$ENTITY_UPPER_CAMEL_CASE$Presenter.php'
        );
    }

    public static function entityPolicy(): Stub
    {
        return new Stub(
            'policy/entity-policy.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Policies',
            '$ENTITY_UPPER_CAMEL_CASE$Policy.php'
        );
    }

    public static function createMigration(): Stub
    {
        return new Stub(
            'migration/create-migration.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Database/Migrations',
            date('Y_m_d_His') . '_create_$ENTITY_PLURAL_LOWER_SNAKE_CASE$_table.php'
        );
    }

    public static function adminIndexView(): Stub
    {
        return new Stub(
            'view/admin-index-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$',
            'index.blade.php'
        );
    }

    public static function adminCreateView(): Stub
    {
        return new Stub(
            'view/admin-create-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$',
            'create.blade.php'
        );
    }

    public static function adminEditVew(): Stub
    {
        return new Stub(
            'view/admin-edit-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$',
            'edit.blade.php'
        );
    }

    public static function adminFormContentView(): Stub
    {
        return new Stub(
            'view/admin-form-content-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$/partials/form',
            'content.blade.php'
        );
    }

    public static function adminFiltersView(): Stub
    {
        return new Stub(
            'view/admin-filters-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$/partials',
            'filters.blade.php'
        );
    }

    public static function adminGlobalActionsView(): Stub
    {
        return new Stub(
            'view/admin-global-actions-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$/partials',
            'global-actions.blade.php'
        );
    }

    public static function adminEntityActionsView(): Stub
    {
        return new Stub(
            'view/admin-entity-actions-view.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Resources/views/admin/$ENTITY_LOWER_HYPHEN_CASE$/partials',
            'entity-actions.blade.php'
        );
    }

    public static function entityTransformer(): Stub
    {
        return new Stub(
            'transformer/entity-transformer.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Transformers',
            '$ENTITY_UPPER_CAMEL_CASE$Transformer.php'
        );
    }

    public static function observer(): Stub
    {
        return new Stub(
            'observer/observer.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Observers',
            '$ENTITY_UPPER_CAMEL_CASE$Observer.php'
        );
    }

    public static function event(): Stub
    {
        return new Stub(
            'event/event.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Events',
            '$EVENT_NAME_UPPER_CAMEL_CASE$.php'
        );
    }

    public static function entityEventInterface(): Stub
    {
        return new Stub(
            'event/entity-event-interface.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Events',
            '$ENTITY_UPPER_CAMEL_CASE$Event.php'
        );
    }

    public static function entityEvent(): Stub
    {
        return new Stub(
            'event/entity-event.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Events/$ENTITY_UPPER_CAMEL_CASE$',
            '$EVENT_NAME_UPPER_CAMEL_CASE$.php'
        );
    }

    public static function eventListener(): Stub
    {
        return new Stub(
            'listener/event-listener.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Listeners',
            '$LISTENER_NAME_UPPER_CAMEL_CASE$.php'
        );
    }

    public static function entityEventListener(): Stub
    {
        return new Stub(
            'listener/entity-event-listener.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Listeners',
            '$LISTENER_NAME_UPPER_CAMEL_CASE$.php'
        );
    }

    public static function permissionServiceProvider(): Stub
    {
        return new Stub(
            'provider/permission-service-provider.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Providers',
            'PermissionServiceProvider.php'
        );
    }

    public static function eventServiceProvider(): Stub
    {
        return new Stub(
            'provider/event-service-provider.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Providers',
            'EventServiceProvider.php'
        );
    }

    public static function navigationServiceProvider(): Stub
    {
        return new Stub(
            'provider/navigation-service-provider.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Providers',
            'NavigationServiceProvider.php'
        );
    }

    public static function commandServiceProvider(): Stub
    {
        return new Stub(
            'provider/command-service-provider.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Providers',
            'CommandServiceProvider.php'
        );
    }

    public static function settingsServiceProvider(): Stub
    {
        return new Stub(
            'provider/settings-service-provider.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Providers',
            'SettingsServiceProvider.php'
        );
    }

    public static function viewComposer(): Stub
    {
        return new Stub(
            'composer/view-composer.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Composers',
            '$COMPOSER_NAME_UPPER_CAMEL_CASE$Composer.php'
        );
    }

    public static function cachedViewComposer(): Stub
    {
        return new Stub(
            'composer/cached-view-composer.stub',
            'Modules/$MODULE_UPPER_CAMEL_CASE$/Composers',
            '$COMPOSER_NAME_UPPER_CAMEL_CASE$Composer.php'
        );
    }
}
