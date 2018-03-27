<?php

namespace Spatie\Php7to5\NodeVisitors;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

/*
 * Converts short array syntax `[]` to long one `array()`
 */
class ShortArraySyntaxReplacer extends NodeVisitorAbstract
{
    /**
     * {@inheritdoc}
     */
    public function leaveNode(Node $node)
    {
        if (!$node instanceof Node\Expr\Array_
                || $node->getAttribute('kind') === Node\Expr\Array_::KIND_LONG) {
            return;
        }

        $node->setAttribute('kind', Node\Expr\Array_::KIND_LONG);

        return $node;
    }
}
