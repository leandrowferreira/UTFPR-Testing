<?php

use PHPUnit\Framework\TestCase;
use Leandro\SillyPascal\Identifier;

class LimitIdentifierTest extends TestCase
{
    /**
     * Um identificador válido deve:
     * - deve ter no mı́nimo um caracter de comprimento.
     * - deve ter no máximo seis caracteres de comprimento.
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new Identifier();
    }

    public function testValidMinimumLength()
    {
        $this->assertTrue($this->validator->validate('a'));
    }

    public function testInvalidMinimumLength()
    {
        $this->assertFalse($this->validator->validate(''));
    }

   public function testValidMaximumLength()
   {
       $this->assertTrue($this->validator->validate('a12345'));
   }

    public function testInvalidMaximumLength()
    {
        $this->assertFalse($this->validator->validate('a123456'));
    }
}
