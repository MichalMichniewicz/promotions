<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

use BigTeddies\Promotions\Api\Data\PromotionsInterface;
use BigTeddies\Promotions\Api\PromotionsRepositoryInterface;
use BigTeddies\Promotions\Model\ResourceModel\Promotions as ResourcePromotions;
use BigTeddies\Promotions\Model\ResourceModel\Promotions\CollectionFactory
    as PromotionsCollectionFactory;


class PromotionsRepository implements PromotionsRepositoryInterface
{
    /**
     * @var ResourcePromotions
     */
    protected $resource;

    /**
     * @var PromotionsFactory
     */
    protected $promotionFactory;

    /**
     * @var PromotionsCollectionFactory
     */
    protected $promotionCollectionFactory;

    /**
     * @param ResourcePromotions $resource
     * @param PromotionsFactory $promotionFactory
     * @param PromotionsCollectionFactory $promotionCollectionFactory
     */
    public function __construct(
        ResourcePromotions $resource,
        PromotionsFactory $promotionFactory,
        PromotionsCollectionFactory $promotionCollectionFactory,
    ) {
        $this->resource = $resource;
        $this->promotionFactory = $promotionFactory;
        $this->promotionCollectionFactory = $promotionCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function save(PromotionsInterface $promotion)
    {
        try {
            $this->resource->save($promotion);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the promotion: %1', $exception->getMessage()));
        }
        return $promotion;
    }

    /**
     * @inheritDoc
     */
    public function get(string $promotionId)
    {
        $promotion = $this->promotionFactory->create();
        $this->resource->load($promotion, $promotionId);
        if (!$promotion->getId()) {
            throw new NoSuchEntityException(__('Promotion with id "%1" does not exist.', $promotionId));
        }

        return $promotion;
    }

    /**
     * @inheritDoc
     */
    public function getList()
    {
        return $this->promotionCollectionFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function delete(PromotionsInterface $promotion)
    {
        try {
            $promotionModel = $this->promotionFactory->create();
            $this->resource->load($promotionModel, $promotion->getId());
            $this->resource->delete($promotionModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the promotion: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(string $promotionId)
    {
        return $this->delete($this->get($promotionId));
    }
}
