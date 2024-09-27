<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Api;

interface GroupsInterface
{
    /**
     * Get list of groups
     *
     * @return \BigTeddies\Promotions\Api\Data\GroupsInterface[]
     */
    public function getList();

    /**
     * Add new group
     *
     * @api
     * @param string $name
     * @return \BigTeddies\Promotions\Api\Data\ReturnMessageInterface
     */
    public function addGroups(string $name);

    /**
     * Delete group
     *
     * @param string $groupId
     * @return \BigTeddies\Promotions\Api\Data\ReturnMessageInterface
     */
    public function removeGroup(string $groupId);
}
