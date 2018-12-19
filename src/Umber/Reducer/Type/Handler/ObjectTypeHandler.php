<?php

declare(strict_types=1);

namespace Umber\Reducer\Type\Handler;

use Umber\Database\EntityInterface;
use Umber\Reducer\Context\ReducerContextInterface;
use Umber\Reducer\Handler\ReducerHandlerContext;
use Umber\Reducer\Registry\ReducerHandlerRegistry;
use Umber\Reducer\Type\Resolved\ObjectResolvedType;
use Umber\Reducer\Type\ResolvedTypeInterface;
use Umber\Reducer\Type\TypeHandlerInterface;

use Umber\Prototype\Column\PublicIdentityAwareInterface;

use Traversable;

final class ObjectTypeHandler implements TypeHandlerInterface
{
    private $registry;

    public function __construct(ReducerHandlerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ResolvedTypeInterface $type): bool
    {
        return $type instanceof ObjectResolvedType;
    }

    /**
     * {@inheritdoc}
     *
     * @param ObjectResolvedType $type
     */
    public function handle($input, ResolvedTypeInterface $type, ReducerContextInterface $context)
    {
        $hash = spl_object_hash($input);

        if ($context->getObjectHistory()->has($hash)) {
            $data = [
                '$repetition' => true,
            ];

            if ($input instanceof EntityInterface && $input instanceof PublicIdentityAwareInterface) {
                $data['id'] = $input->getPublicId();
            }

            return $data;
        }

        $class = $type->getClassName();
        $handler = $this->registry->find($class);

        $context->getObjectHistory()->add($hash);
        $context->getReducerHandlerHistory()->add($handler);

        $reducerHandlerContext = new ReducerHandlerContext($context);

        $reduced = $handler->reduce($input, $reducerHandlerContext);

        if ($reduced instanceof Traversable) {
            $reduced = iterator_to_array($reduced);
        }

        return $reduced;
    }
}
