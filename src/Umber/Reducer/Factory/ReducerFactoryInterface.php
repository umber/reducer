<?php

declare(strict_types=1);

namespace Umber\Reducer\Factory;

use Umber\Reducer\ReducerInterface;

interface ReducerFactoryInterface
{
    public function create(): ReducerInterface;
}
