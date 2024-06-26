<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $body,
        public SupportStatus $status
    ) {}

    public static function makeFromRequest(StoreUpdateSupport $request, string $id = null): self
    {

        return new self(
            $id ?? $request->id,
            $request->subject,
            $request->body,
            SupportStatus::A
        );
    }
}
