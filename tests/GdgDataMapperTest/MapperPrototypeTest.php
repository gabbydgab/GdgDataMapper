<?php

/**
 * The MIT License
 *
 * Copyright (c) 2014, Gab Amba <gamba@gabbydgab.com>.
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
 */

namespace GdgDataMapperTest;

use GdgDataMapper\Exception\RuntimeException AS GdgDataMapperRuntimeException;

/**
 * GdgDataMapperTest\MapperPrototypeTest
 * 
 * @package GdgDataMapperTest
 */
class MapperPrototypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \GdgDataMapper\Mapper\AbstractPrototype
     */
    protected $mapper;
    
    /** 
     * @var \GdgDataMapper\AbstractMapperTrait
     */
    protected $trait;

    
    public function setUp()
    {
        $this->mapper = $this->getMockBuilder("GdgDataMapper\Mapper\AbstractPrototype")
                ->getMockForAbstractClass();
        
        $this->trait = $this->getMockBuilder("GdgDataMapper\AbstractMapperTrait")->getMockForTrait();
    }
    
    /** 
     * @test
     * @expectedException \GdgDataMapper\Exception\RuntimeException
     * @expectedExceptionMessage Mapper prototype is not set
     */
    public function mustReturnRuntimeExceptionIfMapperPrototypeIsNotSet()
    {
        $this->trait->getMapperPrototype();
    }
    
    /** 
     * @test
     */
    public function mustReturnMapperPrototype()
    {
        $this->trait->setMapperPrototype($this->mapper);
        $this->assertEquals($this->mapper, $this->trait->getMapperPrototype());
    }
}
