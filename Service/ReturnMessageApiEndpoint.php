<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Service;

use BigTeddies\Promotions\Api\Data\ReturnMessageInterface;
use BigTeddies\Promotions\Model\Data\ReturnMessageFactory;

class ReturnMessageApiEndpoint
{
    /**
     * @var ReturnMessageFactory
     */
    protected ReturnMessageFactory $returnMessageFactory;

    /**
     * @param ReturnMessageFactory $returnMessageFactory
     */
    public function __construct(
        ReturnMessageFactory $returnMessageFactory
    ) {
        $this->returnMessageFactory = $returnMessageFactory;
    }

    /**
     * Prepare adn return message for endpoints
     *
     * @param string $message
     * @param bool $success
     * @return ReturnMessageInterface
     */
    public function returnMessage(string $message, bool $success = true): ReturnMessageInterface
    {
        $returnMessage = $this->returnMessageFactory->create();
        $returnMessage->setMessage($message);
        $returnMessage->setSuccess($success);
        return $returnMessage;
    }

}
