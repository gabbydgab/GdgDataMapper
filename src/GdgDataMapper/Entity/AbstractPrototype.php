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

namespace GdgDataMapper\Entity;

use GdgDataMapper\Exception\InvalidArgumentException AS GdgDataMapperInvalidArgumentException;
use GdgDataMapper\Exception\RuntimeException AS GdgDataMapperRuntimeException;

/**
 * GdgDataMapper\Entity\AbstractPrototype
 * 
 * @package GdgDataMapper\Entity
 */
abstract class AbstractPrototype implements AwareInterface
{
    protected $keyId;
    protected $keyName;


    public function setKeyId($id)
    {
        $this->keyId = $id;
    }
    
    public function getKeyId()
    {
        if(!isset($this->keyId)) {
            throw new GdgDataMapperRuntimeException("Key id is not set");
        } 
        
        return $this->keyId;
    }
    
    public function setKeyName($name)
    {
        if(is_int($name)) {
            throw new GdgDataMapperInvalidArgumentException("Name value should not be integer");
        }
        
        if(is_object($name)) {
            throw new GdgDataMapperInvalidArgumentException("Name value should not be object");
        }
        
        $this->keyName = $name;
    }
    
    public function getKeyName()
    {
        if (!isset($this->keyName)) {
            throw new GdgDataMapperRuntimeException("Key name is not set");
        }
        
        return $this->keyName;
    }
}
