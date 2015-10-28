<?php

/*
 * This file is part of the YetheeDateFormBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yethee\DateFormBundle\Tests\Form\Extension;

use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;
use Yethee\DateFormBundle\Form\Extension\DateTypeExtension;

/**
 * @author Denis <liquid.yethee@hotmail.com>
 */
class DateTypeExtensionTest extends TypeTestCase
{
    public function testTimezoneShouldBeFixed()
    {
        date_default_timezone_set('Europe/Moscow');

        $date = new \DateTime('2015-10-01');

        $form = $this->factory->create('date', null, array(
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
        ));

        $form->submit('2015-10-01');

        $this->assertDateTimeEquals($date, $form->getData());
    }

    protected function getExtensions()
    {
        $extension = new DateTypeExtension();

        return array_merge(
            parent::getExtensions(),
            array(
                new PreloadedExtension(array(), array(
                    $extension->getExtendedType() => array($extension)
                ))
            )
        );
    }

}
