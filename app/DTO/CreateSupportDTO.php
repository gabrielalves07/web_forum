<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $body,
        public string $status
    ) {}

    public function makeFromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->subject,
            $request->body,
            'a'
        );
    }
}
