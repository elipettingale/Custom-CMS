<?php

namespace Modules\Core\Services;

use EliPett\CodeGeneration\Structs\Generator;

class GeneratorFactory
{
    public static function adminResource(): Generator
    {
        return new Generator('Admin Resource', [
            StubFactory::adminResourceController(),
            StubFactory::adminStoreRequest(),
            StubFactory::adminUpdateRequest(),
            StubFactory::repositoryInterface(),
            StubFactory::eloquentRepository(),
            StubFactory::entityWithPresenter(),
            StubFactory::presenter(),
            StubFactory::entityPolicy(),
            StubFactory::createMigration(),
            StubFactory::adminIndexView(),
            StubFactory::adminCreateView(),
            StubFactory::adminEditVew(),
            StubFactory::adminFormContentView(),
            StubFactory::adminFiltersView(),
            StubFactory::adminGlobalActionsView(),
            StubFactory::adminEntityActionsView()
        ]);
    }
    public static function adminResourceController(): Generator
    {
        return new Generator('Resource Controller', [
            StubFactory::adminResourceController(),
            StubFactory::adminStoreRequest(),
            StubFactory::adminUpdateRequest()
        ]);
    }

    public static function controller(): Generator
    {
        return new Generator('Controller', [
            StubFactory::controller()
        ]);
    }

    public static function eloquentRepository(): Generator
    {
        return new Generator('Eloquent Repository', [
            StubFactory::repositoryInterface(),
            StubFactory::eloquentRepository()
        ]);
    }

    public static function entityWithPresenter(): Generator
    {
        return new Generator('Entity With Presenter', [
            StubFactory::entityWithPresenter(),
            StubFactory::presenter(),
            StubFactory::entityPolicy(),
            StubFactory::createMigration()
        ]);
    }

    public static function adminResourceViews(): Generator
    {
        return new Generator('Admin Resource Views', [
            StubFactory::adminIndexView(),
            StubFactory::adminCreateView(),
            StubFactory::adminEditVew(),
            StubFactory::adminFormContentView(),
            StubFactory::adminFiltersView(),
            StubFactory::adminGlobalActionsView(),
            StubFactory::adminEntityActionsView()
        ]);
    }

    public static function entityTransformer(): Generator
    {
        return new Generator('Entity Transformer', [
            StubFactory::entityTransformer()
        ]);
    }

    public static function observer(): Generator
    {
        return new Generator('Observer', [
            StubFactory::observer()
        ]);
    }

    public static function createMigration(): Generator
    {
        return new Generator('Create Migration', [
            StubFactory::createMigration()
        ]);
    }

    public static function event(): Generator
    {
        return new Generator('Event', [
            StubFactory::event()
        ]);
    }

    public static function entityEvent(): Generator
    {
        return new Generator('Entity Event', [
            StubFactory::entityEventInterface(),
            StubFactory::entityEvent()
        ]);
    }

    public static function eventListener(): Generator
    {
        return new Generator('Event Listener', [
            StubFactory::eventListener()
        ]);
    }

    public static function entityEventListener(): Generator
    {
        return new Generator('Entity Event Listener', [
            StubFactory::entityEventListener()
        ]);
    }

    public static function permissionServiceProvider(): Generator
    {
        return new Generator('Permission Service Provider', [
            StubFactory::permissionServiceProvider()
        ]);
    }

    public static function eventServiceProvider(): Generator
    {
        return new Generator('Event Service Provider', [
            StubFactory::eventServiceProvider()
        ]);
    }

    public static function navigationServiceProvider(): Generator
    {
        return new Generator('Navigation Service Provider', [
           StubFactory::navigationServiceProvider()
        ]);
    }

    public static function commandServiceProvider(): Generator
    {
        return new Generator('Command Service Provider', [
            StubFactory::commandServiceProvider()
        ]);
    }

    public static function settingsServiceProvider(): Generator
    {
        return new Generator('Settings Service Provider', [
            StubFactory::settingsServiceProvider()
        ]);
    }

    public static function viewComposer(): Generator
    {
        return new Generator('View Composer', [
            StubFactory::viewComposer()
        ]);
    }

    public static function cachedViewComposer(): Generator
    {
        return new Generator('Cached View Composer', [
            StubFactory::cachedViewComposer()
        ]);
    }
}
