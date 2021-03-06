<?php

/*
 * The MIT License
 *
 * Copyright (c) 2012 Allan Sun <sunajia@gmail.com>
 * Copyright (c) 2012 Toha <tohenk@yahoo.com>
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

namespace MwbExporter\Formatter\Sencha\ExtJS3;

use MwbExporter\Formatter as BaseFormatter;
use MwbExporter\Model\Base;

class Formatter extends BaseFormatter
{
    const CFG_CLASS_PREFIX   = 'classPrefix';
    const CFG_PARENT_CLASS   = 'parentClass';

    protected function init()
    {
        $this->setDatatypeConverter(new DatatypeConverter());
        $this->addConfigurations(array(
            static::CFG_INDENTATION     => 4,
            static::CFG_FILENAME        => 'JS/%schema%/%entity%.%extension%',
            static::CFG_CLASS_PREFIX    => 'SysX.App',
            static::CFG_PARENT_CLASS    => 'SysX.Ui.App',
        ));
    }

    /**
     * (non-PHPdoc)
     * @see MwbExporter.Formatter::createTable()
     */
    public function createTable(Base $parent, $node)
    {
        return new Model\Table($parent, $node);
    }

    /**
     * (non-PHPdoc)
     * @see MwbExporter.FormatterInterface::createColumns()
     */
    public function createColumns(Base $parent, $node)
    {
        return new Model\Columns($parent, $node);
    }

    /**
     * (non-PHPdoc)
     * @see MwbExporter.FormatterInterface::createColumn()
     */
    public function createColumn(Base $parent, $node)
    {
        return new Model\Column($parent, $node);
    }

    /**
     * (non-PHPdoc)
     * @see MwbExporter.FormatterInterface::createIndex()
     */
    public function createIndex(Base $parent, $node)
    {
        return new Model\Index($parent, $node);
    }

    public function getTitle()
    {
        return 'Sencha ExtJS3 Model';
    }

    public function getFileExtension()
    {
        return 'js';
    }
}