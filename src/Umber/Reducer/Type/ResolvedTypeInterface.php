<?php

declare(strict_types=1);

namespace Umber\Reducer\Type;

interface ResolvedTypeInterface
{
    public function getInternalType(): string;
}
