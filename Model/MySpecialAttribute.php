<?php

declare(strict_types=1);

namespace Something\Awesome\Model;

use Magento\Framework\DataObject;
use Something\Awesome\Api\Data\MySpecialAttributeInterface;

class MySpecialAttribute extends DataObject implements MySpecialAttributeInterface
{
    public function getLabel(): string
    {
        return $this->getData(self::LABEL);
    }

    public function setLabel(string $label): self
    {
        return $this->setData(self::LABEL, $label);
    }

    public function getValue(): string
    {
        return $this->getData(self::VALUE);
    }

    public function setValue(string $value): self
    {
        return $this->setData(self::VALUE, $value);
    }

    public function getReferenceId(): int
    {
        return $this->getData(self::REFERENCE_ID);
    }

    public function setReferenceId(
        int $referenceId
    ): self {
        return $this->setData(self::REFERENCE_ID, $referenceId);
    }
}
