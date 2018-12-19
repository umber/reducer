<?php

declare(strict_types=1);

namespace Umber\Reducer\Type;

use Umber\Reducer\ReducerInterface;

interface TypeHandlerReducerAwareInterface
{
    public function setReducer(ReducerInterface $reducer): void;
}
