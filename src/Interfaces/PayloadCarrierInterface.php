<?php declare(strict_types=1);
/**
 * e-Arc Framework - the explicit Architecture Framework
 * base payload object/interface
 *
 * @package earc/payload
 * @link https://github.com/Koudela/eArc-payload/
 * @copyright Copyright (c) 2018-2019 Thomas Koudela
 * @license http://opensource.org/licenses/MIT MIT License
 */

namespace eArc\Payload\Interfaces;

/**
 * A payload carrier is an object carrying a payload. The payload is of
 * arbitrary type.
 */
interface PayloadCarrierInterface
{
    /**
     * If an initializer is supplied it get called if the payload on
     * construction time is null or on reset(). The return value is taken as
     * payload. Otherwise the payload is set to null.
     *
     * If the payload is null, the payload carrier has no payload.
     *
     * @param mixed|null $payload
     * @param callable|null $initializer
     */
    public function __construct($payload = null, ?callable $initializer = null);

    /**
     * Check whether a payload is carried.
     *
     * @return bool
     */
    public function has();

    /**
     * Get the payload.
     *
     * @return mixed|null
     */
    public function get();

    /**
     * Replace the payload. Returns the old payload.
     *
     * @param mixed|null $payload
     *
     * @return mixed|null
     */
    public function set($payload);

    /**
     * Reset the payload. Returns the old payload.
     *
     * @return mixed|null
     */
    public function reset();
}
