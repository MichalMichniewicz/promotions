<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

use BigTeddies\Promotions\Api\Data\GroupsInterface;
use BigTeddies\Promotions\Api\GroupsRepositoryInterface;
use BigTeddies\Promotions\Model\ResourceModel\Groups as ResourceGroups;
use BigTeddies\Promotions\Model\ResourceModel\Groups\CollectionFactory
    as GroupsCollectionFactory;

class GroupsRepository implements GroupsRepositoryInterface
{
    /**
     * @var ResourceGroups
     */
    protected $resource;

    /**
     * @var GroupsFactory
     */
    protected $groupFactory;

    /**
     * @var GroupsCollectionFactory
     */
    protected $groupCollectionFactory;

    /**
     * @param ResourceGroups $resource
     * @param GroupsFactory $groupFactory
     * @param GroupsCollectionFactory $groupCollectionFactory
     */
    public function __construct(
        ResourceGroups $resource,
        GroupsFactory $groupFactory,
        GroupsCollectionFactory $groupCollectionFactory
    ) {
        $this->resource = $resource;
        $this->groupFactory = $groupFactory;
        $this->groupCollectionFactory = $groupCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function save(GroupsInterface $group)
    {
        try {
            $this->resource->save($group);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the group: %1', $exception->getMessage()));
        }
        return $group;
    }

    /**
     * @inheritDoc
     */
    public function get(string $groupId)
    {
        $group = $this->groupFactory->create();
        $this->resource->load($group, $groupId);
        if (!$group->getId()) {
            throw new NoSuchEntityException(__('Promotion with id "%1" does not exist.', $groupId));
        }

        return $group;
    }

    /**
     * @inheritDoc
     */
    public function getList()
    {
        return $this->groupCollectionFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function delete(GroupsInterface $group)
    {
        try {
            $groupModel = $this->groupFactory->create();
            $this->resource->load($groupModel, $group->getId());
            $this->resource->delete($groupModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the group: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(string $groupId)
    {
        return $this->delete($this->get($groupId));
    }
}
