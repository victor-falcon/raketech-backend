<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        response()->macro(
            'jsonCollection',
            function (Collection|array $data, $status = 200, array $headers = [], $options = 0) {
                if (is_array($data)) {
                    $data = collect($data);
                }

                return response()->json(
                    [
                        'data' => $data,
                        'metadata' => [
                            'total' => $data->count(),
                        ],
                    ],
                    $status,
                    $headers,
                    $options,
                );
            }
        );
    }
}
