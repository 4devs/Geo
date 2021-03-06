<?php
namespace FDevs\Geo\Form\Type;

use FDevs\Geo\Form\DataTransformer\PointTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PointType extends AbstractType
{
    /** @var array */
    private $coordinates = ['lat' => 44.946798, 'lng' => 34.1092134];

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('coordinates', 'coordinates', ['required' => $options['required']])
            ->addModelTransformer(new PointTransformer());
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'geo_point';
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['default_coordinates'] = $options['default_coordinates'];
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'data_class'          => 'FDevs\Geo\Model\Point',
                    'default_coordinates' => $this->coordinates,
                    'required'            => true,
                ]
            )
            ->setDefined(['default_coordinates'])
            ->addAllowedTypes(['default_coordinates' => 'array']);
    }

    /**
     * set Default Coordinates
     *
     * @param array $coordinates
     *
     * @return $this
     */
    public function setDefaultCoordinates(array $coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }
}
