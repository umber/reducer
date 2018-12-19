<?php

declare(strict_types=1);

namespace Umber\Reducer;

use Umber\Reducer\Context\ReducerContextInterface;
use Umber\Reducer\Processor\ReducerPostProcessorInterface;
use Umber\Reducer\Type\TypeHandlerInterface;

interface ReducerInterface
{
    public function registerTypeHandler(TypeHandlerInterface $handler): void;
    public function registerReducerProcessor(ReducerPostProcessorInterface $handler): void;

    public function enableMaxDepthCheck(int $depth): void;

    /**
     * @param mixed $input
     *
     * @return mixed
     */
    public function reduce($input, ReducerContextInterface $context);

    public function clone(): ReducerInterface;
}
