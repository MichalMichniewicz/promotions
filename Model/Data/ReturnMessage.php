<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Model\Data;

use BigTeddies\Promotions\Api\Data\ReturnMessageInterface;
use Magento\Framework\DataObject;

class ReturnMessage extends DataObject implements ReturnMessageInterface
{
    /**
     * @inheritDoc
     */
    public function getSuccess()
    {
        return $this->getData(self::SUCCESS) === null ? null
            : (int)$this->getData(self::SUCCESS);
    }

    /**
     * @inheritDoc
     */
    public function setSuccess($success)
    {
        $this->setData(self::SUCCESS, $success);
    }

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        return $this->getData(self::MESSAGE) === null ? null
            : (string)$this->getData(self::MESSAGE);
    }

    /**
     * @inheritDoc
     */
    public function setMessage($message)
    {
        $this->setData(self::MESSAGE, $message);
    }
}
