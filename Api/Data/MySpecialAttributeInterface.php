<?php

declare(strict_types=1);

namespace Something\Awesome\Api\Data;

interface MySpecialAttributeInterface
{
    public const LABEL        = 'label';
    public const VALUE        = 'value';
    public const REFERENCE_ID = 'reference_id';

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel(string $label): self;

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue(string $value): self;

    /**
     * @return int
     */
    public function getReferenceId(): int;

    /**
     * @param int $referenceId
     *
     * @return $this
     */
    public function setReferenceId(int $referenceId): self;
}
