<?php

declare(strict_types=1);

namespace Umber\Reducer\Factory;

use Umber\Reducer\Context\ReducerContextInterface;

interface ReducerContextFactoryInterface
{
    public function create(): ReducerContextInterface;
}
