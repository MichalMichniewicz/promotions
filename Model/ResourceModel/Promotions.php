<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Promotions extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'big_teddies_promotions_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('big_teddies_promotions', 'entity_id');
        $this->_useIsObjectNew = true;
    }
}
