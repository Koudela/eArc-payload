<?php declare(strict_types=1);
/**
 * e-Arc Framework - the explicit Architecture Framework
 * payload base object/interface
 *
 * @package earc/payload
 * @link https://github.com/Koudela/eArc-payload/
 * @copyright Copyright (c) 2018-2019 Thomas Koudela
 * @license http://opensource.org/licenses/MIT MIT License
 */

namespace eArc\Payload;

use eArc\Payload\Interfaces\PayloadCarrierInterface;

class PayloadCarrier implements PayloadCarrierInterface
{
    /** @var callable|null */
    protected $initializer;

    /** @var mixed|null */
    protected $payload;

    /**
     * @param mixed|null    $payload
     * @param callable|null $initializer
     */
    public function __construct($payload = null, ?callable $initializer = null)
    {
        $this->payload = $payload;
        $this->initializer = $initializer;

        if (!$this->has()) {
            $this->init();
        }
    }

    /**
     * @inheritdoc
     */
    public function has()
    {
        return null !== $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function get()
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function set($payload)
    {
        $oldPayload = $this->payload;

        $this->payload = $payload;

        return $oldPayload;
    }

    /**
     * @inheritdoc
     */
    public function reset()
    {
        $oldPayload = $this->payload;

        $this->init();

        return $oldPayload;
    }

    /**
     * Initialises the payload.
     */
    protected function init()
    {
        if (null === $this->initializer) {
            return;
        }

        $this->payload = ($this->initializer)();
    }
}