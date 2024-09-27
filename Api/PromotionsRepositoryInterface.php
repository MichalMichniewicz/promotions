<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Api;

use BigTeddies\Promotions\Api\Data\PromotionsInterface;

interface PromotionsRepositoryInterface
{
    /**
     * Save Promotion
     * @param PromotionsInterface $promotionn
     * @return PromotionsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        PromotionsInterface $promotion
    );

    /**
     * Retrieve Promotion
     * @param string $promotionId
     * @return PromotionsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get(string $promotionId);

    /**
     * Retrieve Promotion matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return PromotionsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(

    );

    /**
     * Delete Promotion
     * @param PromotionsInterface $promotion
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(PromotionsInterface $promotion);

    /**
     * Delete Promotion by ID
     * @param string $promotionId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(string $promotionId);
}
