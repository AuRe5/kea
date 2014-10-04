<?php

class __Mustache_a09cf0a10597d72abc8259a022bfa5a3 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . 'Dear ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ',
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'Thanks for registering. Bla bla bla.
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'best
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'blalba';

        return $buffer;
    }
}
