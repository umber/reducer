<?php

declare(strict_types=1);

namespace Umber\Reducer\Processor\Delegate;

use Umber\Reducer\Context\ReducerContextInterface;
use Umber\Reducer\ReducerInterface;

final class DelegateReducer
{
    private $delegate;

    public function __construct(callable $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * @return mixed
     */
    public function process(ReducerInterface $reducer, ReducerContextInterface $context)
    {
        $configuration = new DelegateConfiguration();
        $input = ($this->delegate)($configuration);

        $configuration->normalise($context);
        $configuration->configure($reducer, $context);

        $reduced = $reducer->reduce($input, $context);

        return $reduced;
    }
}
