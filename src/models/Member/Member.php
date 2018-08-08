<?php namespace professionalweb\sendsay\models\Member;

use professionalweb\sendsay\interfaces\Protocol\Models\Member\MemberData;
use professionalweb\sendsay\interfaces\Protocol\Models\Anketa\AnketaAnswer;
use professionalweb\sendsay\interfaces\Protocol\Models\Member\Member as IMember;

/**
 * Subscriber
 * @package professionalweb\sendsay\models\Member
 */
class Member implements IMember
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var AnketaAnswer[]
     */
    private $anketaAnswers = [];

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

    /**
     * Get anketa's answers
     *
     * @return AnketaAnswer[]
     */
    public function getAnketasAnswers(): array
    {
        return $this->anketaAnswers;
    }

    /**
     * Set answers
     *
     * @param array $answers
     *
     * @return Member
     */
    public function setAnketasAnswers(array $answers): self
    {
        $this->anketaAnswers = $answers;

        return $this;
    }

    /**
     * Add answers
     *
     * @param AnketaAnswer $answers
     *
     * @return Member
     */
    public function addAnketaAnswers(AnketaAnswer $answers): self
    {
        $this->anketaAnswers[] = $answers;

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $anketas = [];
        foreach ($this->getAnketasAnswers() as $answers) {
            $anketas[$answers->getAnketaId()] = $answers->toArray();
        }

        return [
            'email'                    => $this->getEmail(),
            'addr_type'                => 'email',
            'source'                   => $this->getIp(),
            'newbie.confirm"'          => $this->needConfirm() ? 1 : 0,
            'newbie.letter.confirm'    => $this->getConfirmationLetterTemplateId(),
            'newbie.letter.no-confirm' => $this->getNonConfirmationLetterTemplateId(),
            'obj'                      => $anketas,
        ];
    }
}