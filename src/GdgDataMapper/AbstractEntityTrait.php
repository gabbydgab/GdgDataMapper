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

namespace GdgDataMapper;

use GdgDataMapper\Entity\AwareInterface AS EntityAwareInterface;
use GdgDataMapper\Exception\RuntimeException AS GdgDataMapperRuntimeException;

/**
 * GdgDataMapper\AbstractEntityTrait
 * 
 * @package GdgDataMapper
 */
trait AbstractEntityTrait
{
    /**
     * @var \GdgDataMapper\Entity\AwareInterface
     */
    protected $entity;
    
    /**
     * @param EntityAwareInterface $entity
     */
    public function setEntityPrototype(EntityAwareInterface $entity)
    {
        $this->entity = $entity;
    }
    
    /**
     * @return \GdgDataMapper\Entity\AwareInterface
     * @throws Exception
     */
    public function getEntityPrototype()
    {
        if (!$this->entity) {
            throw new GdgDataMapperRuntimeException("Entity prototype is not set");
        }
        
        return $this->entity;
    }
}
