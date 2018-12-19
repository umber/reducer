<?php

declare(strict_types=1);

namespace Umber\Reducer\Type\Resolver;

use Umber\Reducer\Type\ResolvedTypeInterface;

interface TypeResolverInterface
{
    /**
     * Return the type of a given variable.
     *
     * @param mixed $input
     */
    public function resolve($input): ResolvedTypeInterface;
}
