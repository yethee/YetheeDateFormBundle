<?php

/*
 * This file is part of the YetheeDateFormBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yethee\DateFormBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Intl\Intl;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * TypeExtension
 *
 * @author Denis <liquid.yethee@hotmail.com>
 */
abstract class TypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        if (version_compare(Intl::getIcuVersion(), '54.0', '<')) {
            $timezoneNormalizer = function (Options $options, $timezone) {
                if (null === $timezone) {
                    $timezone = date_default_timezone_get();
                }

                if ('Europe/Moscow' === $timezone) {
                    $timezone = 'Etc/GMT-3';
                }

                return $timezone;
            };

            // OptionsResolver 2.6+
            if (method_exists($resolver, 'setNormalizer')) {
                $resolver->setNormalizer('view_timezone', $timezoneNormalizer);
            } else {
                $resolver->setNormalizers(array(
                    'view_timezone' => $timezoneNormalizer,
                ));
            }
        }
    }
}
