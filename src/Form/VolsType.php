<?php
 namespace App\Form;

use App\Entity\Companie;
use App\Entity\Offre;
use App\Repository\CompanieRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class VolsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
    
       
        ->add('depart', DateType::class,[
            "label"=>false
        ])
        


       
        ->add('destination', TextType::class,[
            "label"=>false
        ])
        
        ->add('Companie', 'collection', array(
            'type' => new VolsType(),
            'allow_add' => true, 
            'by_reference' => false,
            'cascade_validation'  => true,
            ))

       
       ->add('Companie', EntityType::class, [
            // looks for choices from this entity
            'class' => Companie::class,
            'query_builder' => function(CompanieRepository $er) {
                return $er->createQueryBuilder('u');
                
                
              
            },
            
            'choice_label' => 'nom',
             'multiple' => true,
             'expanded' => true,


        ])



         ->add('submit', SubmitType::class, [
            'label' => "rechercher",
            'attr' => [
                'class' => 'btn btn-primary'
            ] 
        ]);

            }

            

         public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
