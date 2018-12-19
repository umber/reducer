<?php

declare(strict_types=1);

namespace Umber\Reducer\Type\Resolved;

use Umber\Reducer\Type\ResolvedTypeInterface;

/**
 * {@inheritdoc}
 */
final class ResolvedType implements ResolvedTypeInterface
{
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getInternalType(): string
    {
        return $this->type;
    }
}
