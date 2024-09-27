<?php
declare(strict_types=1);

namespace BigTeddies\Promotions\Api\Data;

interface ReturnMessageInterface
{
    const SUCCESS = 'success';
    const MESSAGE = 'message';

    /**
     * Get success
     *
     * @return string
     */
    public function getSuccess();

    /**
     * Set success
     *
     * @param string $success
     * @return boolean
     */
    public function setSuccess($success);

    /**
     * Get success
     *
     * @return string
     */
    public function getMessage();

    /**
     * Set message
     *
     * @param string $message
     * @return string
     */
    public function setMessage($message);
}
