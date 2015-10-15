<?php

namespace Cms\ProductManagerBundle\Entity\Repository;

use Cms\ProductManagerBundle\Entity\ProductCategoryDefinitions;
use Cms\ProductManagerBundle\Entity\ProductCategories;
use Doctrine\ORM\EntityRepository;
use Cms\CoreBundle\Repository\CoreRepository;

/**
 * ProductCategoriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductCategoriesRepository extends CoreRepository
{


    public function getAllProductCategories(){

        $return = array(
            'results' => array(),
            'titles' => array()
        );

        $keys = array(
            'Category Id' => 'pc.id',
            'Category Name' => 'pcd.productCategoryName',
            'Parent Category Id' => 'pc.parentProductCategoryId',
            'Created' => 'pc.created',
            'Modified' => 'pc.modified',
            'Modified By' => 'pc.modifiedBy'
        );

        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select($keys)
            ->from($this->productCategoriesTable, 'pc')
            ->innerjoin($this->productCategoryDefinitionsTable, 'pcd', 'WITH' , 'pc.id = pcd.productCategoryId AND pcd.languageId = :lang')
            ->setParameter('lang', $this->languageId);

        $results = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
        $return['results'] = $results;
        $return['titles'] = $keys;


        return $return;

    }

    /****
     *
     * Get product all product categories for Form
     *
     * @return mixed
     *
     */
    public function getFormProductCategoryChoices(){

        $categories = $this->findAll();
        $return = array();

        //Because product category names are stored in the product_category_definitions table
        //We need to call the setProductCategoryName() method which will retrieve the name
        //and set the productCategoryName variable with in the entity
        foreach ($categories as $category){

            $category->setProductCategoryName($this->languageId);

            $return[] = $category;

        }

        return $return;

    }


}