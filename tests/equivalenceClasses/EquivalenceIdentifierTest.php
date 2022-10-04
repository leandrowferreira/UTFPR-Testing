<?php

use PHPUnit\Framework\TestCase;
use Leandro\SillyPascal\Identifier;

class EquivalenceIdentifierTest extends TestCase
{
    /**
     * Um identificador válido deve:
     * - começar com uma letra
     * - conter apenas letras ou dı́gitos
     * - deve ter no mı́nimo um caracter de comprimento.
     * - deve ter no máximo seis caracteres de comprimento.
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new Identifier();
    }

    public function testValidStartingLetter()
    {
        $this->assertTrue($this->validator->validate('aa'));
    }

    public function testInvalidStartingLetter()
    {
        $this->assertFalse($this->validator->validate('1a'));
    }

    public function testValidLettersAndDigits()
    {
        $this->assertTrue($this->validator->validate('a1'));
    }

    public function testInvalidLettersAndDigits()
    {
        $this->assertFalse($this->validator->validate('a$1'));
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
