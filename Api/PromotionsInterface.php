<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Api;

interface PromotionsInterface
{
    /**
     * Get list of promotions
     *
     * @return \BigTeddies\Promotions\Api\Data\PromotionsInterface[]
     */
    public function getList();

    /**
     * Add new promotion
     *
     * @param string $name
     * @param int[]|null $groups
     * @return \BigTeddies\Promotions\Api\Data\ReturnMessageInterface
     */
    public function addPromotion(string $name, array $groups = null);

    /**
     * Delete promotion
     *
     * @param string $promotionId
     * @return \BigTeddies\Promotions\Api\Data\ReturnMessageInterface
     */
    public function removePromotion(string $promotionId);

}
