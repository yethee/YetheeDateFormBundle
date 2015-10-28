<?php

/*
 * This file is part of the YetheeDateFormBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yethee\DateFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * DateTypeExtension
 *
 * @author Denis <liquid.yethee@hotmail.com>
 */
class DateTypeExtension extends TypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return method_exists(AbstractType::class, 'getBlockPrefix') ? DateType::class : 'date';
    }
}
