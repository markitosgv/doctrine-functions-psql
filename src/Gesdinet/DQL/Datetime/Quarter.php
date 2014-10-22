<?php

namespace Gesdinet\DQL\Datetime;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * DateFunction ::= "EXTRACT(QUARTER FROM" "(" ArithmeticPrimary ")"
 * @author Marcos Gómez Vilches <marcos@gesdinet.com>
 */
class Quarter extends FunctionNode
{
    public $dateExpression;

    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->dateExpression = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(SqlWalker $sqlWalker)
    {
        return 'EXTRACT(QUARTER FROM ' .
            $this->dateExpression->dispatch($sqlWalker) .
        ')';
    }
}
