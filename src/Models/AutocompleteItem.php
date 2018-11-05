<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 03.11.18
 */

namespace BookingCom\Models;

use BookingCom\Models\Autocomplete\Endorsement;
use BookingCom\Models\Autocomplete\Forecast;

class AutocompleteItem extends AbstractModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string|null
     */
    private $url;
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */
    private $cityUfi;
    /**
     * @var string|null
     */
    private $region;
    /**
     * @var string
     */
    private $label;
    /**
     * @var string|null
     */
    private $country;
    /**
     * @var string|null
     */
    private $cityName;
    /**
     * @var string|null
     */
    private $language;
    /**
     * @var bool
     */
    private $rightToLeft;
    /**
     * @var int|null
     */
    private $numberOfHotels;
    /**
     * @var string|null
     */
    private $countryName;
    /**
     * @var Location|null
     */
    private $location;
    /**
     * @var string
     */
    private $timezone;
    /**
     * @var array
     */
    private $endorsements;
    /**
     * @var int|null
     */
    private $numberOfDestionations;
    /**
     * @var array
     */
    private $topDestinations;
    /**
     * @var Forecast|null
     */
    private $forecast;

    public function __construct(
        int $id,
        string $type,
        ?string $url,
        ?string $name,
        ?string $cityUfi,
        ?string $region,
        string $label,
        ?string $country,
        ?string $cityName,
        ?string $language,
        ?string $countryName,
        bool $rightToLeft,
        ?int $numberOfHotels,
        ?string $timezone,
        ?int $numberOfDestionations,
        array $topDestinations,
        array $endorsements,
        ?Location $location,
        ?Forecast $forecast
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->url = $url;
        $this->name = $name;
        $this->cityUfi = $cityUfi;
        $this->region = $region;
        $this->label = $label;
        $this->country = $country;
        $this->cityName = $cityName;
        $this->language = $language;
        $this->rightToLeft = $rightToLeft;
        $this->numberOfHotels = $numberOfHotels;
        $this->countryName = $countryName;
        $this->timezone = $timezone;
        $this->location = $location;
        $this->endorsements = $endorsements;
        $this->numberOfDestionations = $numberOfDestionations;
        $this->topDestinations = $topDestinations;
        $this->forecast = $forecast;
    }

    public static function fromArray(array $array): self
    {
        $location = null;
        if (!empty($array['latitude']) && !empty($array['longitude'])) {
            $location = Location::fromArray($array);
        }
        return new self(
            $array['id'],
            $array['type'],
            $array['url'] ?? null,
            $array['name'] ?? null,
            $array['city_ufi'] ?? null,
            $array['region'] ?? null,
            $array['label'],
            $array['country'],
            $array['city_name'] ?? null,
            $array['language'],
            $array['country_name'],
            $array['right-to-left'] ?? false,
            $array['nr_hotels'] ?? null,
            $array['timezone'] ?? null,
            $array['nr_dest'] ?? null,
            $array['top_destinations'] ?? [],
            self::makeChildrenFromArray($array, Endorsement::class, 'endorsements'),
            $location,
            self::makeChildFromArray($array, Forecast::class, 'forecast')
        );
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getCityUfi(): ?string
    {
        return $this->cityUfi;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function isRightToLeft(): bool
    {
        return $this->rightToLeft;
    }

    /**
     * @return int|null
     */
    public function getNumberOfHotels(): ?int
    {
        return $this->numberOfHotels;
    }

    /**
     * @return string|null
     */
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function getEndorsements(): array
    {
        return $this->endorsements;
    }

    /**
     * @return int|null
     */
    public function getNumberOfDestionations(): ?int
    {
        return $this->numberOfDestionations;
    }

    /**
     * @return array
     */
    public function getTopDestinations(): array
    {
        return $this->topDestinations;
    }

    public function getForecast(): ?Forecast
    {
        return $this->forecast;
    }
}
