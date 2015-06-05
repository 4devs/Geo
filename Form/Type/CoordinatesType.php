<?php
namespace FDevs\Geo\Form\Type;

use FDevs\Geo\Form\DataTransformer\CoordinatesTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
                'lng',
                'text',
                [
                    'constraints'   => array_merge($constraints, [new Assert\Range(['min' => -180, 'max' => 180])]),
                    'label'         => 'longitude',
                    'property_path' => '[0]',
                    'attr'          => ['placeholder' => 'longitude'],
                    'required'      => $options['required'],
                    'label_attr'    => ['class' => 'sr-only']
                ]
            )
            ->add(
                'lat',
                'text',
                [
                    'constraints'   => array_merge($constraints, [new Assert\Range(['min' => -90, 'max' => 90])]),
                    'label'         => 'latitude',
                    'attr'          => ['placeholder' => 'latitude'],
                    'property_path' => '[1]',
                    'required'      => $options['required'],
                    'label_attr'    => ['class' => 'sr-only']
                ]
            )
            ->addModelTransformer(new CoordinatesTransformer());
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
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
