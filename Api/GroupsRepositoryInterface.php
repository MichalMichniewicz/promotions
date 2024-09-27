<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Api;

use BigTeddies\Promotions\Api\Data\GroupsInterface;

interface GroupsRepositoryInterface
{
    /**
     * Save Group
     * @param GroupsInterface $group
     * @return GroupsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        GroupsInterface $group
    );

    /**
     * Retrieve Group
     * @param string $groupId
     * @return GroupsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get(string $groupId);

    /**
     * Retrieve Group matching the specified criteria.
     * @return GroupsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList();

    /**
     * Delete Group
     * @param GroupsInterface $group
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        GroupsInterface $group
    );

    /**
     * Delete Group by ID
     * @param string $groupId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(string $groupId);
}
