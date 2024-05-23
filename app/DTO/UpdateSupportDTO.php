<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $body,
        public string $status
    ) {}

    public function makeFromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            $request->body,
            'a'
        );
    }
}
