<?php

/*
 * This file is part of the YetheeDateFormBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yethee\DateFormBundle\Form\Extension;

/**
 * DateTimeTypeExtension
 *
 * @author Denis <liquid.yethee@hotmail.com>
 */
class DateTimeTypeExtension extends TypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix')
            ? 'Symfony\Component\Form\Extension\Core\Type\DateTimeType'
            : 'datetime';
    }
}
