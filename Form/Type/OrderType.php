<?php

namespace Acme\PizzaBundle\Form\Type;

use
    Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilder
;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('customer', new CustomerType())
            ->add('items', 'collection', array(
                'type'      => new OrderItemType(),
                'allow_add' => true,
                'prototype' => true,
            ))
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Acme\PizzaBundle\Entity\Order');
    }

     public function getName()
    {
        return 'order';
    }
}
