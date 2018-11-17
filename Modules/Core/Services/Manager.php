<?php

namespace Modules\Core\Services;

use Modules\Core\ValueObjects\ManagerResponse;

class Manager
{
    /* @var ManagerResponse */
    private $response;
    private $calls;

    protected function begin(): void
    {
        $this->response = new ManagerResponse();
        $this->calls = 0;

        begin_transaction();
    }

    protected function call($result, string $data = null)
    {
        $this->calls++;

        if (!$result) {
            $this->response->setError("#{$this->calls}");
        }

        if ($data !== null) {
            $this->response->setData($data, $result);
        }

        return $result;
    }

    protected function complete(): ManagerResponse
    {
        if ($this->response->wasSuccessful()) {
            commit_transaction();
        } else {
            rollback_transaction();
        }

        return $this->response;
    }
}
