<?php

namespace Dali\Bitcore\Responses;

use Dali\Bitcore\Traits\Collection;
use Dali\Bitcore\Traits\ReadOnlyArray;
use Dali\Bitcore\Traits\SerializableContainer;

class BitcoredResponse extends Response implements
    \ArrayAccess,
    \Countable,
    \Serializable,
    \JsonSerializable
{
    use Collection, ReadOnlyArray, SerializableContainer;
}
