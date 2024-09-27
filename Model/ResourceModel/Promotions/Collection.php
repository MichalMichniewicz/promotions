<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model\ResourceModel\Promotions;

use BigTeddies\Promotions\Model\Promotions as Model;
use BigTeddies\Promotions\Model\ResourceModel\Promotions as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'big_teddies_promotions_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
