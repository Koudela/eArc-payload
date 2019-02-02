# earc/payload

Basic payload carrier blueprint.

# installation

```bash
$ composer install earc/payload
```

# basic usage

```php
use eArc\Payload\PayloadCarrier;

$carrier = new PayloadCarrier();
```

Please refer to the 
[PayloadCarrierInterface](https://github.com/Koudela/eArc-payload/blob/master/src/Interfaces/PayloadCarrierInterface.php) 
for details.

If you want to add the payload carrier functionality to a existing class use the
`eArc\Payload\Trait\PayloadCarrierTrait`.