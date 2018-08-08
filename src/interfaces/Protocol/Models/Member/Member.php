<?php namespace professionalweb\sendsay\Protocol\Models\Member;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Interface for subscriber
 * @package professionalweb\sendsay\Protocol\Models\Member
 */
interface Member extends Arrayable
{
    /**
     * Get subscriber e-mail
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Get subscriber IP
     *
     * @return string
     */
    public function getIp(): string;

    /**
     * Check confirmation need
     *
     * @return bool
     */
    public function needConfirm(): bool;

    /**
     * Get template for confirmation letter
     *
     * @return string
     */
    public function getConfirmationLetterTemplateId(): string;

    /**
     * Get template for letter when confirmation not needed
     *
     * @return string
     */
    public function getNonConfirmationLetterTemplateId(): string;

    /**
     * Get subscriber data
     *
     * @return MemberData[]
     */
    public function getData(): array;

    public function getAnketasAnswers(): array;
}