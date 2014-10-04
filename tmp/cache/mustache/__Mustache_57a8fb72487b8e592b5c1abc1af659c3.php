<?php

class __Mustache_57a8fb72487b8e592b5c1abc1af659c3 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<h1>Form - Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</h1>
';
        $buffer .= $indent . '<form action=\'/\' method=\'POST\'>
';
        $buffer .= $indent . '<input type=\'name\' name=\'name\' id=\'name\' /><input type=\'submit\' value=\'senden\' />
';
        $buffer .= $indent . '</form>';

        return $buffer;
    }
}
