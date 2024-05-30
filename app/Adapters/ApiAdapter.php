<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\PaginationInterface;

class ApiAdapter
{
    public static function toJson(
        PaginationInterface $data
    ) {

        $previousPage = $data->isFirstPage() ? null : $data->getNumberPreviousPage();
        $nextPage = $data->isLastPage() ? null : $data->getNumberNextPage();

        return DefaultResource::collection($data->items())
                                ->additional([
                                    'meta' => [
                                        'total' => $data->total(),
                                        'is_first_page' => $data->isFirstPage(),
                                        'is_last_page' => $data->isLastPage(),
                                        'current_page' => $data->currentPage(),
                                        'previous_page' => $previousPage,
                                        'next_page' => $nextPage
                                    ]
                                ]);
    }
}
