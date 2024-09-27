<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Api\Data;

interface PromotionsInterface
{
    /**
     * String constants for property names
     */
    public const ENTITY_ID = "entity_id";
    public const NAME = "name";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";
    public const GROUPS = "groups";

    /**
     * Getter for EntityId.
     *
     * @return int|null
     */
    public function getPromotionId(): ?int;

    /**
     * Setter for EntityId.
     *
     * @param int|null $entityId
     *
     * @return void
     */
    public function setPromotionId(?int $entityId): void;

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Setter for Name.
     *
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void;

    /**
     * Getter for CreatedAt.
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Setter for CreatedAt.
     *
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void;

    /**
     * Getter for UpdatedAt.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * Setter for UpdatedAt.
     *
     * @param string|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(?string $updatedAt): void;

    /**
     * Getter for Groups.
     *
     * @return string|null
     */
    public function getGroups(): ?string;

    /**
     * Setter for Groups.
     *
     * @param string|null $groups
     *
     * @return void
     */
    public function setGroups(?string $groups): void;
}
