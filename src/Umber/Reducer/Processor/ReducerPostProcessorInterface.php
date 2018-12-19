<?php

declare(strict_types=1);

namespace Umber\Reducer\Processor;

use Umber\Reducer\Context\ReducerContextInterface;
use Umber\Reducer\ReducerInterface;
use Umber\Reducer\Type\ResolvedTypeInterface;

interface ReducerPostProcessorInterface
{
    public function supports(ResolvedTypeInterface $type): bool;

    /**
     * @param mixed $handled
     *
     * @return mixed
     */
    public function process($handled, ReducerInterface $reducer, ReducerContextInterface $context);
}
