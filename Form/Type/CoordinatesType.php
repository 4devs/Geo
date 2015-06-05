<?php
namespace FDevs\Geo\Form\Type;

use FDevs\Geo\Form\DataTransformer\CoordinatesTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CoordinatesType extends AbstractType
{

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraints = [
            new Assert\Type(['type' => 'numeric']),
        ];
        if ($options['required']) {
            $constraints[] = new Assert\NotBlank();
        }
        $builder
            ->add(
                'lat',
                'text',
                [
                    'constraints' => array_merge($constraints, [new Assert\Range(['min' => -90, 'max' => 90])]),
                    'attr'        => ['placeholder' => 'latitude'],
                    'label'       => 'latitude',
                    'required'    => $options['required'],
                    'label_attr'  => ['class' => 'sr-only']
                ]
            )
            ->add(
                'lng',
                'text',
                [
                    'constraints' => array_merge($constraints, [new Assert\Range(['min' => -180, 'max' => 180])]),
                    'label'       => 'longitude',
                    'attr'        => ['placeholder' => 'longitude'],
                    'required'    => $options['required'],
                    'label_attr'  => ['class' => 'sr-only']
                ]
            )
            ->addModelTransformer(new CoordinatesTransformer());
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['required' => true]);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'coordinates';
    }
}
