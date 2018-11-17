<?php

namespace Modules\Core\Services;

class MessageFactory
{
    public static function entityCreated(string $entity): string
    {
        return trans('messages.success.entity-created', [
            'entity' => $entity
        ]);
    }

    public static function entityNotCreated(string $entity, string $errors = null): string
    {
        return trans_error('messages.errors.entity-created', [
            'entity' => $entity,
            'errors' => $errors
        ]);
    }

    public static function entityUpdated(string $entity): string
    {
        return trans('messages.success.entity-updated', [
            'entity' => $entity
        ]);
    }

    public static function entityNotUpdated(string $entity, string $errors = null): string
    {
        return trans_error('messages.errors.entity-updated', [
            'entity' => $entity,
            'errors' => $errors
        ]);
    }

    public static function entityDeleted(string $entity): string
    {
        return trans('messages.success.entity-deleted', [
            'entity' => $entity
        ]);
    }

    public static function entityNotDeleted(string $entity, string $errors = null): string
    {
        return trans_error('messages.errors.entity-deleted', [
            'entity' => $entity,
            'errors' => $errors
        ]);
    }
}
