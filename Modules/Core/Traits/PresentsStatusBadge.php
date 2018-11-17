<?php

namespace Modules\Core\Traits;

trait PresentsStatusBadge
{
    public function statusBadge()
    {
        if (!$status = $this->entity->status) {
            return 'Unknown';
        }

        return "<span class='badge status-badge bg-{$status->background} text-{$status->text}'>{$status->label}</span>";
    }
}
