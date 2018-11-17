<?php

if (!function_exists('begin_transaction'))
{
    function begin_transaction()
    {
        \DB::beginTransaction();
    }
}

if (!function_exists('commit_transaction'))
{
    function commit_transaction()
    {
        \DB::commit();
    }
}

if (!function_exists('rollback_transaction'))
{
    function rollback_transaction()
    {
        \DB::rollBack();
    }
}

if (!function_exists('disable_foreign_key_checks'))
{
    function disable_foreign_key_checks()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }
}

if (!function_exists('unguard_entities'))
{
    function unguard_entities()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
    }
}

if (!function_exists('truncate_entity'))
{
    function truncate_entity(string $entity)
    {
        if (is_subclass_of($entity, \Illuminate\Database\Eloquent\Model::class)) {
            $entity::query()->truncate();
        }
    }
}

if (!function_exists('trans_error'))
{
    function trans_error(string $key, array $parameters = [])
    {
        $message = trans($key, $parameters);

        if ($errors = array_get($parameters, 'errors')) {
            $message .= ' (' . implode(', ', $errors) . ')';
        }

        return $message;
    }
}

if (!function_exists('old_collection'))
{
    function old_collection(string $key, \Illuminate\Support\Collection $collection = null)
    {
        if (!$old = old($key)) {
            if (!$collection) {
                return collect();
            }

            return $collection;
        }

        return collect($old);
    }
}

if (!function_exists('stock_image_path'))
{
    function stock_image_path(int $number = null)
    {
        if (!$number) {
            $number = random_int(1, 11);
        }

        return asset("images/stock/{$number}.jpg");
    }
}
