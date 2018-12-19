<?php

declare(strict_types=1);

namespace Umber\Reducer\Factory;

use Umber\Reducer\Context\History\ObjectHistory;
use Umber\Reducer\Context\History\ReducerHandlerHistory;
use Umber\Reducer\Context\ReducerContext;
use Umber\Reducer\Context\ReducerContextInterface;

/**
 * {@inheritdoc}
 */
final class ReducerContextFactory implements ReducerContextFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(): ReducerContextInterface
    {
        $context = new ReducerContext(
            0,
            new ObjectHistory(),
            new ReducerHandlerHistory()
        );

        return $context;
    }
}
