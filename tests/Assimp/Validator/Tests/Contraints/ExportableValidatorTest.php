<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2013 Marco Graetsch <magdev3.0@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    magdev
 * @copyright 2013 Marco Graetsch <magdev3.0@gmail.com>
 * @package   php-assimp-validator
 * @license   http://opensource.org/licenses/MIT MIT License
 */

namespace Assimp\Validator\Tests\Constraints;

use Assimp\Validator\Constraints\ExportableValidator;
use Assimp\Validator\Constraints\Exportable;

/**
 * Test for exportable file-formats
 *
 * @author magdev
 */
class ExportableValidatorTest extends \PHPUnit_Framework_TestCase
{
    protected $context;
    protected $validator;


    /**
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->context = $this->getMock('Symfony\Component\Validator\ExecutionContext', array(), array(), '', false);
        $this->validator = new ExportableValidator();
        $this->validator->initialize($this->context);
    }


    /**
     * @see PHPUnit_Framework_TestCase::tearDown()
     */
    protected function tearDown()
    {
        $this->context = null;
        $this->validator = null;
    }


    /**
     * @covers \Assimp\Validator\Constraints\ExportableValidator::validate
     */
    public function testValidateSuccess()
    {
        $this->context->expects($this->never())
            ->method('addViolation');

        $this->validator->validate('stl', new Exportable());
    }


    /**
     * @covers \Assimp\Validator\Constraints\ExportableValidator::validate
     */
    public function testValidateFailure()
    {
        $this->context->expects($this->once())
            ->method('addViolation');

        $this->validator->validate('pdf', new Exportable());
    }
}