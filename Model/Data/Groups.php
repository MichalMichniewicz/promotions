<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model\Data;

use BigTeddies\Promotions\Api\Data\GroupsInterface;
use Magento\Framework\DataObject;

class Groups extends DataObject implements GroupsInterface
{
    /**
     * Getter for EntityId.
     *
     * @return int|null
     */
    public function getGroupId(): ?int
    {
        return $this->getData(self::ENTITY_ID) === null ? null
            : (int)$this->getData(self::ENTITY_ID);
    }

    /**
     * Setter for EntityId.
     *
     * @param int|null $entityId
     *
     * @return void
     */
    public function setGroupId(?int $entityId): void
    {
        $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Setter for Name.
     *
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * Getter for CreatedAt.
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Setter for CreatedAt.
     *
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Getter for UpdatedAt.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Setter for UpdatedAt.
     *
     * @param string|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Getter for Promotions.
     *
     * @return string|null
     */
    public function getPromotions(): ?string
    {
        return $this->getData(self::PROMOTIONS);
    }

    /**
     * Setter for Promotions.
     *
     * @param string|null $promotions
     *
     * @return void
     */
    public function setPromotions(?string $promotions): void
    {
        $this->setData(self::PROMOTIONS, $promotions);
    }
}
