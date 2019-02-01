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
use eArc\Payload\Traits\PayloadCarrierTrait;

class PayloadCarrier implements PayloadCarrierInterface
{
    use PayloadCarrierTrait;

    /**
     * @param null $payload
     * @param callable|null $initializer
     */
    public function __construct($payload = null, ?callable $initializer = null)
    {
        $this->initPayloadTrait($payload, $initializer);
    }
}
