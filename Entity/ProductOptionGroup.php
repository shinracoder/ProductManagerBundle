<?php

namespace Oni\ProductManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oni\CoreBundle\Entity\Traits\LastUserEntity;
use Oni\CoreBundle\Entity\Traits\TimestampableEntity;

/**
 * ProductOptionGroups
 *
 * @ORM\Table(name="oni_product_option_groups")
 * @ORM\Entity(repositoryClass="Oni\ProductManagerBundle\Entity\Repository\ProductOptionGroupRepository")
 */
class ProductOptionGroup
{

    use TimestampableEntity;
    use LastUserEntity;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dataType", type="string", length=20, nullable=true)
     */
    private $dataType;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="userOptionSelectType", type="string", length=30, nullable=true)
     */
    private $userOptionSelectType;

    /**
     * @var \Oni\ProductManagerBundle\Entity\ProductOptionGroupType
     *
     * @ORM\ManyToOne(targetEntity="Oni\ProductManagerBundle\Entity\ProductOptionGroupType", inversedBy="productOptionGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optionGroupTypeId", referencedColumnName="id")
     * })
     */
    private $optionGroupType;


    /**
     * @var array
     */
    public static $dataTypes = [
        'Select'        => 'SELECT',
        'Text'          => 'TEXT',
        'Multi Select'  => 'MULTI_SELECT',
    ];


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataType
     *
     * @param string $dataType
     *
     * @return ProductOptionGroups
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Get dataType
     *
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }


    /**
     * Set userOptionSelectType
     *
     * @param string $userOptionSelectType
     *
     * @return ProductOptionGroups
     */
    public function setUserOptionSelectType($userOptionSelectType)
    {
        $this->userOptionSelectType = $userOptionSelectType;

        return $this;
    }

    /**
     * Get userOptionSelectType
     *
     * @return string
     */
    public function getUserOptionSelectType()
    {
        return $this->userOptionSelectType;
    }

    /**
     * Set optionGroupType
     *
     * @param \Oni\ProductManagerBundle\Entity\ProductOptionGroupType $optionGroupType
     *
     * @return ProductOptionGroup
     */
    public function setOptionGroupType(\Oni\ProductManagerBundle\Entity\ProductOptionGroupType $optionGroupType = null)
    {
        $this->optionGroupType = $optionGroupType;

        return $this;
    }

    /**
     * Get optionGroupType
     *
     * @return \Oni\ProductManagerBundle\Entity\ProductOptionGroupType
     */
    public function getOptionGroupType()
    {
        return $this->optionGroupType;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ProductOptionGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get optionGroupTypeId
     *
     * @return integer
     */
    public function getOptionGroupTypeId()
    {
        return $this->optionGroupTypeId;
    }
}
