<?php

namespace App\Helpers;

trait PayloadHelper
{
    function getPayloadFillable(array $payload, array $fillable)
    {
        $data = [];
        foreach ($payload as $key => $value) {
            if (!in_array($key, $fillable)) {
                continue;
            }
            if ($value == null) {
                continue;
            }
            $data[$key] = $value;
        }
        return $data;
    }
}
