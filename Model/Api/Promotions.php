<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model\Api;

use BigTeddies\Promotions\Api\Data\ReturnMessageInterface;
use BigTeddies\Promotions\Api\PromotionsInterface;
use BigTeddies\Promotions\Service\ReturnMessageApiEndpoint;
use BigTeddies\Promotions\Model\PromotionsFactory;
use BigTeddies\Promotions\Model\PromotionsRepository;
use BigTeddies\Promotions\Service\PromotionsGroups;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;


class Promotions implements PromotionsInterface
{
    protected PromotionsFactory $promotionsFactory;
    protected PromotionsRepository $promotionsRepository;
    protected PromotionsGroups $promotionsGroups;
    protected ReturnMessageApiEndpoint $returnMessage;

    public function __construct(
        PromotionsFactory $promotionsFactory,
        PromotionsRepository $promotionsRepository,
        PromotionsGroups $promotionsGroups,
        ReturnMessageApiEndpoint $returnMessage
    ) {
        $this->promotionsFactory = $promotionsFactory;
        $this->promotionsRepository = $promotionsRepository;
        $this->promotionsGroups = $promotionsGroups;
        $this->returnMessage = $returnMessage;
    }

    /**
     * Get list of promotions
     *
     * @return array|\BigTeddies\Promotions\Api\Data\PromotionsInterface[]
     * @throws LocalizedException
     */
    public function getList()
    {
        $promotions = $this->promotionsRepository->getList();
        $list = [];

        foreach ($promotions as $promotion) {
            $promotion->setGroups($this->promotionsGroups->getGroupsByPromotionId($promotion->getId()));
            $list[] = $promotion->getData();
        }

        return $list;
    }

    /**
     * Add new promotion
     *
     * @param $name
     * @param $groups
     * @return ReturnMessageInterface
     * @throws CouldNotSaveException
     */
    public function addPromotion($name, $groups = null): ReturnMessageInterface
    {
        $promotionModel = $this->promotionsFactory->create();
        $promotionModel->setName($name);
        $promotion = $promotionModel->save();

        if (!empty($groups)) {
            $this->promotionsGroups->addPromotionsToGroups([$promotion->getId()], $groups);
        }

        return $this->returnMessage->returnMessage('Promotion added');
    }

    /**
     * Remove promotion by id
     *
     * @param string $promotionId
     * @return ReturnMessageInterface
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function removePromotion(string $promotionId): ReturnMessageInterface
    {
        $this->promotionsRepository->deleteById($promotionId);

        return $this->returnMessage->returnMessage('Promotion deleted');
    }
}
