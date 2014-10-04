<?php

class __Mustache_89b49fdce3ea9c18e145110bb5cc91db extends Mustache_Template
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
        $buffer .= $indent . '<form action=\'/form\' method=\'POST\'>
';
        $buffer .= $indent . '<input type=\'name\' name=\'name\' id=\'name\' /><input type=\'submit\' value=\'senden\' />
';
        $buffer .= $indent . '</form>';

        return $buffer;
    }
}
