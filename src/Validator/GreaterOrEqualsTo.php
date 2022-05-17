<?php

declare(strict_types=1);

namespace OpenIDConnectClient\Validator;

use Webmozart\Assert\Assert;
use DateTimeImmutable;

final class GreaterOrEqualsTo implements ValidatorInterface
{
    use ValidatorTrait;

    public function isValid($expectedValue, $actualValue): bool
    {
        Assert::isInstanceOf($expectedValue, DateTimeImmutable::class);
        Assert::isInstanceOf($actualValue, DateTimeImmutable::class);

        if ($actualValue >= $expectedValue) {
            return true;
        }

        $this->message = sprintf('%s is invalid as it is not greater than %s', $actualValue, $expectedValue);

        return false;
    }
}
