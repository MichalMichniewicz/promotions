<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Service;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Exception\CouldNotSaveException;

class PromotionsGroups
{
    const PROMOTION_GROUP_TABLE = 'big_teddies_promotion_group';

    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
        ResourceConnection $resourceConnection
    ) {
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * Add promotion to groups
     *
     * @param array $promotionsIds
     * @param array $groupsIds
     * @return void
     * @throws CouldNotSaveException
     */
    public function addPromotionsToGroups(array $promotionsIds, array $groupsIds): void
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName(self::PROMOTION_GROUP_TABLE);
        $data = [];

        foreach ($promotionsIds as $promotionId) {
            foreach ($groupsIds as $groupId) {
                $data[] = [
                    'promotion_id' => $promotionId,
                    'group_id' => $groupId
                ];
            }
        }

        $connection->beginTransaction();
        try {
            $connection->insertMultiple($tableName, $data);
        } catch (\Exception $e) {
            $connection->rollBack();
            throw new CouldNotSaveException(__('Could not save the promotions to groups'));
        }
        $connection->commit();
    }

    /**
     * Get groups by promotion id
     *
     * @param string $promotionId
     * @return string
     */
    public function getGroupsByPromotionId(string $promotionId): string
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName(self::PROMOTION_GROUP_TABLE);
        $select = $connection->select()
            ->from(
                ['pgt' => $tableName],
                ['group_id']
            )
            ->where('pgt.promotion_id = ' . $promotionId);
        $groupsIds = $connection->fetchAll($select);

        if (empty($groupsIds)) {
            return '';
        }

        $groups = array_map(function ($group) {
            return $group['group_id'];
        }, $groupsIds);

        return implode(',', $groups);
    }

}
