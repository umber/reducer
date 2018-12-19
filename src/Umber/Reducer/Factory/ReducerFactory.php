<?php

declare(strict_types=1);

namespace Umber\Reducer\Factory;

use Umber\Reducer\Processor\Delegate\DelegateReducerProcessor;
use Umber\Reducer\Reducer;
use Umber\Reducer\ReducerInterface;
use Umber\Reducer\Registry\ReducerHandlerRegistry;
use Umber\Reducer\Type\Handler\ArrayTypeHandler;
use Umber\Reducer\Type\Handler\BasicValueTypeHandler;
use Umber\Reducer\Type\Handler\ObjectTypeHandler;
use Umber\Reducer\Type\Resolver\TypeResolverInterface;

/**
 * {@inheritdoc}
 */
final class ReducerFactory implements ReducerFactoryInterface
{
    private $type;
    private $registry;

    public function __construct(TypeResolverInterface $type, ReducerHandlerRegistry $registry)
    {
        $this->type = $type;
        $this->registry = $registry;
    }

    /**
     * {@inheritdoc}
     */
    public function create(): ReducerInterface
    {
        $reducer = new Reducer($this->type);

        $reducer->registerTypeHandler(new BasicValueTypeHandler());
        $reducer->registerTypeHandler(new ArrayTypeHandler());
        $reducer->registerTypeHandler(new ObjectTypeHandler($this->registry));

        $reducer->registerReducerProcessor(new DelegateReducerProcessor());

        return $reducer;
    }
}
