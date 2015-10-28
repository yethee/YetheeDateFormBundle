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
use Yethee\DateFormBundle\Form\Extension\DateTimeTypeExtension;

/**
 * @author Denis <liquid.yethee@hotmail.com>
 */
class DateTimeTypeExtensionTest extends TypeTestCase
{
    public function testTimezoneShouldBeFixed()
    {
        date_default_timezone_set('Europe/Moscow');

        $date = new \DateTime('2015-10-28 15:07:00');

        $form = $this->factory->create('datetime', null, array(
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd HH:mm',
        ));

        $form->submit('2015-10-28 15:07');

        $this->assertDateTimeEquals($date, $form->getData());
    }

    protected function getExtensions()
    {
        $extension = new DateTimeTypeExtension();

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
