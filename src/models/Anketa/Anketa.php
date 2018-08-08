<?php namespace professionalweb\sendsay\models\Anketa;

use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\Anketa as IAnketa;

/**
 * Anketa
 * @package professionalweb\sendsay\models\Anketa
 */
class Anketa implements IAnketa
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get anketa ID
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->data['id'] ?? '';
    }

    /**
     * Get anketa name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'] ?? '';
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id'   => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}