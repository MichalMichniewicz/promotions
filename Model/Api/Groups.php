<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model\Api;

use BigTeddies\Promotions\Api\Data\ReturnMessageInterface;
use BigTeddies\Promotions\Api\GroupsInterface;
use BigTeddies\Promotions\Model\GroupsFactory;
use BigTeddies\Promotions\Model\GroupsRepository;
use BigTeddies\Promotions\Service\ReturnMessageApiEndpoint;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class Groups implements GroupsInterface
{
    /**
     * @var GroupsFactory
     */
    protected GroupsFactory $groupsFactory;

    /**
     * @var GroupsRepository
     */
    protected GroupsRepository $groupsRepository;

    /**
     * @var ReturnMessageApiEndpoint
     */
    protected ReturnMessageApiEndpoint $returnMessage;

    /**
     * @param GroupsFactory $groupsFactory
     * @param GroupsRepository $groupsRepository
     * @param ReturnMessageApiEndpoint $returnMessage
     */
    public function __construct(
        GroupsFactory $groupsFactory,
        GroupsRepository $groupsRepository,
        ReturnMessageApiEndpoint $returnMessage
    ) {
        $this->groupsFactory = $groupsFactory;
        $this->groupsRepository = $groupsRepository;
        $this->returnMessage = $returnMessage;
    }

    /**
     * Get list of all groups
     *
     * @throws LocalizedException
     */
    public function getList(): array
    {
        $promotions = $this->groupsRepository->getList();
        $list = [];

        foreach ($promotions as $promotion) {
            $list[] = $promotion->getData();
        }

        return $list;
    }

    /**
     * Add new promotion group
     *
     * @param $name
     * @return ReturnMessageInterface
     * @throws LocalizedException
     */
    public function addGroups($name): ReturnMessageInterface
    {
        $groupModel = $this->groupsFactory->create();
        $groupModel->setName($name);
        $this->groupsRepository->save($groupModel);

        return $this->returnMessage->returnMessage('Group added');
    }

    /**
     * Remove group by id
     *
     * @param string $groupId
     * @return ReturnMessageInterface
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function removeGroup(string $groupId): ReturnMessageInterface
    {
        $this->groupsRepository->deleteById($groupId);

        return $this->returnMessage->returnMessage('Group deleted');
    }
}
