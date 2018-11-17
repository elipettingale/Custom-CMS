<?php

namespace Modules\Core\Services\Loquate;

use EliPett\LoquateClient\Services\LoquateClient;
use Illuminate\Support\Collection;
use Modules\Core\Services\AddressLookup;

class LoquateAddressLookup implements AddressLookup
{
    private $client;

    public function __construct(LoquateClient $client)
    {
        $this->client = $client;
    }

    public function search(string $search): Collection
    {
        $results = $this->client->addressVerification->find([
            'Text' => $search
        ]);

        $data = collect();

        foreach ($results as $result) {
            if ($result['Type'] === 'Address') {
                $data->push([
                    'id' => $result['Id'],
                    'address' => $result['Text'] . ', ' . $result['Description']
                ]);
            }
        }

        return $data;
    }

    public function retrieve(string $id): array
    {
        $result = $this->client->addressVerification->retrieve($id);

        $line2 = $result['Line2'];

        if ($result['Line3'] !== '') {
            $line2 .= ', ' . $result['Line3'];
        }

        if ($result['Line4'] !== '') {
            $line2 .= ', ' . $result['Line4'];
        }

        return [
            'line_1' => $result['Line1'],
            'line_2' => $line2,
            'city' => $result['City'],
            'postcode' => $result['PostalCode']
        ];
    }
}
