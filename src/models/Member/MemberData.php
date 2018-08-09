<?php namespace professionalweb\sendsay\models\Member;

use professionalweb\sendsay\interfaces\Protocol\Models\Member\MemberData as IMemberData;

/**
 * Basic class for member data
 * @package professionalweb\sendsay\models\Member
 */
class MemberData implements IMemberData
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $mode;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $type;

    public function __construct(string $key = '', string $mode = '', string $value = '', ?string $type = null)
    {
        $this->key = $key;
        $this->mode = $mode;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            $this->getKey(),
            $this->getMode(),
            $this->getValue(),
            $this->getType(),
        ];
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }
}