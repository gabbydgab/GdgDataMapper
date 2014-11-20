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

//use GdgMapperTest\SampleEntity;

/**
 * GdgDataMapperTest\EntityPrototypeTest
 * 
 * @package GdgDataMapperTest
 */
class EntityPrototypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \GdgDataMapper\Entity\AbstractPrototype
     */
    protected $entity;
    
    protected $trait;

    public function setUp()
    {
        $this->entity = $this->getMockBuilder("GdgDataMapper\Entity\AbstractPrototype")
                ->getMockForAbstractClass();
        
        $this->trait = $this->getMockBuilder("GdgDataMapper\AbstractEntityTrait")->getMockForTrait();
    }
    
    /** 
     * @test
     * @expectedException \GdgDataMapper\Exception\RuntimeException
     * @expectedExceptionMessage Entity prototype is not set
     */
    public function mustReturnRuntimeExceptionIfEntityPrototypeIsNotSet()
    {
        $this->trait->getEntityPrototype();
    }

    /**
     * @test
     */
    public function mustReturnEntityPrototype()
    {
        $this->trait->setEntityPrototype($this->entity);        
        $this->assertEquals($this->entity, $this->trait->getEntityPrototype());
    }
    
    /** 
     * @test
     * @expectedException \GdgDataMapper\Exception\RuntimeException
     * @expectedExceptionMessage Key id is not set
     */
    public function mustReturnRuntimeExceptionIfKeyIdIsNotSet()
    {
        $this->entity->getKeyId();
    }
    
    public function keyIds()
    {
        return [
            [1234],
            ["uid-1203234"],
            ["stringkey"],
        ];
    }
    
    /** 
     * @test
     * @dataProvider keyIds
     */
    public function mustReturnKeyId($ids)
    {    
        $this->entity->setKeyId($ids);        
        $this->assertEquals($ids, $this->entity->getKeyId());
    }
    
    /** 
     * @test
     * @expectedException \GdgDataMapper\Exception\RuntimeException
     * @expectedExceptionMessage Key name is not set
     */
    public function mustReturnRuntimeExceptionIfKeyNameIsNotSet()
    {
        $this->entity->getKeyName();
    }
    
    public function keyNames()
    {
        return [
            ['product_id'],
            ['brand_id']  
        ];
    }
    
    /**
     * @test
     * @dataProvider keyNames
     */
    public function mustReturnKeyName($name)
    {
        $this->entity->setKeyName($name);
        $this->assertEquals($name, $this->entity->getKeyName());
    }
    
    /**
     * @test
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Name value should not be object
     */
    public function mustReturnInvalidExceptionIfKeyNameIsTypeObject()
    {
        $this->entity->setKeyName(new \stdClass());
    }
    
    /**
     * @test
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Name value should not be integer
     */
    public function mustReturnInvalidExceptionIfKeyNameIsTypeInteger()
    {
        $this->entity->setKeyName(1234);
    }
}
