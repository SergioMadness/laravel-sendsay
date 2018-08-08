<?php namespace professionalweb\sendsay\models\Member;

use professionalweb\sendsay\interfaces\Protocol\Models\Member\MemberData;
use professionalweb\sendsay\interfaces\Protocol\Models\Member\Member as IMember;

class Member implements IMember
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
     * Get subscriber e-mail
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->data['email'] ?? '';
    }

    /**
     * Get subscriber IP
     *
     * @return string
     */
    public function getIp(): string
    {
        return $this->data['ip'] ?? '';
    }

    /**
     * Check confirmation need
     *
     * @return bool
     */
    public function needConfirm(): bool
    {
        return isset($this->data['newbie.confirm']) && $this->data['newbie.confirm'];
    }

    /**
     * Get template for confirmation letter
     *
     * @return string
     */
    public function getConfirmationLetterTemplateId(): string
    {
        return $this->data['newbie.letter.confirm'] ?? '';
    }

    /**
     * Get template for letter when confirmation not needed
     *
     * @return string
     */
    public function getNonConfirmationLetterTemplateId(): string
    {
        return $this->data['newbie.letter.no-confirm'] ?? '';
    }

    /**
     * Get subscriber data
     *
     * @return MemberData[]
     */
    public function getData(): array
    {
        return $this->data['fields'] ?? [];
    }

    public function getAnketasAnswers(): array
    {
        return $this->data['anketas'] ?? [];
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [];
    }
}