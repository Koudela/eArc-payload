<?php
/**
 * e-Arc Framework - the explicit Architecture Framework
 * base payload object/interface
 *
 * @package earc/payload
 * @link https://github.com/Koudela/eArc-payload/
 * @copyright Copyright (c) 2018-2019 Thomas Koudela
 * @license http://opensource.org/licenses/MIT MIT License
 */

namespace eArc\Payload\Traits;

/**
 * This trait implements the payload carrier interface. Use both or extend the 
 * payload carrier class.
 */
trait PayloadCarrierTrait
{
    /** @var callable|null */
    protected $payloadInitializer;

    /** @var mixed|null */
    protected $payload;

    /**
     * Call this function in the constructor.
     *
     * If an initializer is supplied it get called if the payload on
     * construction time is null or on reset(). The return value is taken as
     * payload. Otherwise the payload is set to null.
     *
     * If the payload is null, the payload carrier has no payload.
     *
     * @param mixed|null $payload
     * @param callable|null $initializer
     */
    protected function initPayloadTrait($payload = null, ?callable $initializer = null)
    {
        $this->payload = $payload;
        $this->payloadInitializer = $initializer;

        if (!$this->has()) {
            $this->initPayload();
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

        $this->initPayload();

        return $oldPayload;
    }

    /**
     * Initialises the payload.
     */
    protected function initPayload()
    {
        if (null === $this->payloadInitializer) {
            $this->payload = null;
            return;
        }

        $this->payload = ($this->payloadInitializer)();
    }
}
