<?php

declare(strict_types=1);

namespace Umber\Reducer\Type\Handler;

use Umber\Reducer\Context\ReducerContextInterface;
use Umber\Reducer\Type\ResolvedTypeInterface;
use Umber\Reducer\Type\TypeHandlerInterface;

/**
 * A type handler for basic values.
 */
final class BasicValueTypeHandler implements TypeHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function supports(ResolvedTypeInterface $type): bool
    {
        $accepted = [
            'string',
            'integer',
            'boolean',
            'null',
        ];

        return in_array($type->getInternalType(), $accepted);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($input, ResolvedTypeInterface $type, ReducerContextInterface $context)
    {
        return $input;
    }
}
