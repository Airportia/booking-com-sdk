<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Models\Hotel;

use BookingCom\BookingObject;

class Description extends BookingObject
{
    /**
     * @var string
     */
    private $welcomeMessage;
    /**
     * @var string
     */
    private $importantInformation;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $licenseNumber;

    public function __construct(
        string $welcomeMessage,
        string $importantInformation,
        string $description,
        string $licenseNumber
    ) {
        $this->welcomeMessage = $welcomeMessage;
        $this->importantInformation = $importantInformation;
        $this->description = $description;
        $this->licenseNumber = $licenseNumber;
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['hotelier_welcome_message'],
            $array['hotel_important_information'],
            $array['hotel_description'],
            $array['license_number']
        );
    }

    /**
     * @return string
     */
    public function getWelcomeMessage(): string
    {
        return $this->welcomeMessage;
    }

    /**
     * @return string
     */
    public function getImportantInformation(): string
    {
        return $this->importantInformation;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLicenseNumber(): string
    {
        return $this->licenseNumber;
    }
}
