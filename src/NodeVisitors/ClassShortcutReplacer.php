<?php

namespace Spatie\Php7to5\NodeVisitors;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

/*
 * Converts class::class to 'class'
 */
class ClassShortcutReplacer extends NodeVisitorAbstract
{
	private $usesBag = [];

    /**
     * {@inheritdoc}
     */
    public function leaveNode(Node $node)
    {
    	if ($node instanceof Node\Stmt\UseUse) {
    		$this->usesBag[$node->alias] = $node->name;
    		return;
		}

        if ($node instanceof Node\Expr\ClassConstFetch && $node->name == 'class') {
			if ($node->class instanceof Node\Name\FullyQualified) {
				$fqcn = $node->class->toString();
			} else {
				$fqcn = ($this->usesBag[$node->class->toString()] ?? $node->class)->toString();
			}

			return new Node\Scalar\String_($fqcn, [
				'kind' => Node\Scalar\String_::KIND_SINGLE_QUOTED
			]);
		}
    }
}
