<?php

declare(strict_types=1);

namespace Umber\Reducer\Type\Handler;

use Umber\Reducer\Context\ReducerContextInterface;
use Umber\Reducer\ReducerInterface;
use Umber\Reducer\Type\ResolvedTypeInterface;
use Umber\Reducer\Type\TypeHandlerInterface;
use Umber\Reducer\Type\TypeHandlerReducerAwareInterface;

final class ArrayTypeHandler implements TypeHandlerInterface, TypeHandlerReducerAwareInterface
{
    /** @var ReducerInterface */
    private $reducer;

    /**
     * {@inheritdoc}
     */
    public function setReducer(ReducerInterface $reducer): void
    {
        $this->reducer = $reducer;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ResolvedTypeInterface $type): bool
    {
        return $type->getInternalType() === 'array';
    }

    /**
     * {@inheritdoc}
     */
    public function handle($input, ResolvedTypeInterface $type, ReducerContextInterface $context)
    {
        $serialized = [];

        foreach ($input as $key => $value) {
            $serialized[$key] = $this->reducer->reduce($value, $context->clone());
        }

        return $serialized;
    }
}
