<?php

namespace BookingCom\Models\Search;


class AutoComplete
{
    public const TYPE_AIRPORT = 'airport';
    public const TYPE_CITY = 'city';
    public const TYPE_DISTRICT = 'district';
    public const TYPE_HOTEL = 'hotel';
    public const TYPE_LANDMARK = 'landmark';
    public const TYPE_REGION = 'region';
    public const TYPE_THEME = 'theme';


    /** @var  integer */
    private $rightToLeft;

    /** @var  string */
    private $region;

    /** @var  string */
    private $url;

    /** @var  Endorsement[]|null */
    private $endorsements;

    /** @var  string */
    private $id;

    /** @var  string */
    private $cityName;

    /** @var  Forecast|null */
    private $forecast;

    /** @var  integer */
    private $numberOfDestinations;

    /** @var  string */
    private $latitude;

    /** @var  string */
    private $language;

    /** @var  string */
    private $timezone;

    /** @var  array */
    private $topDestinations;

    /** @var  string */
    private $cityUfi;

    /** @var  integer */
    private $numberOfHotels;

    /** @var  string */
    private $longitude;

    /** @var  string */
    private $label;

    /** @var  string */
    private $countryName;

    /** @var  string */
    private $country;

    /** @var  string */
    private $type;

    /** @var  string */
    private $name;


    /**
     * AutoComplete constructor.
     *
     * @param int                $rightToLeft
     * @param string             $region
     * @param string             $url
     * @param Endorsement[]|null $endorsements
     * @param string             $id
     * @param string             $cityName
     * @param Forecast|null      $forecast
     * @param int                $numberOfDestinations
     * @param string             $latitude
     * @param string             $language
     * @param string             $timezone
     * @param array              $topDestinations
     * @param string             $cityUfi
     * @param int                $numberOfHotels
     * @param string             $longitude
     * @param string             $label
     * @param string             $countryName
     * @param string             $country
     * @param string             $type
     * @param string             $name
     */
    public function __construct(int $rightToLeft,
        string $region,
        string $url,
        ? array $endorsements,
        string $id,
        string $cityName,
        ? Forecast $forecast,
        int $numberOfDestinations,
        string $latitude,
        string $language,
        string $timezone,
        array $topDestinations,
        string $cityUfi,
        int $numberOfHotels,
        string $longitude,
        string $label,
        string $countryName,
        string $country,
        string $type,
        string $name)
    {
        $this->rightToLeft          = $rightToLeft;
        $this->region               = $region;
        $this->url                  = $url;
        $this->endorsements         = $endorsements;
        $this->id                   = $id;
        $this->cityName             = $cityName;
        $this->forecast             = $forecast;
        $this->numberOfDestinations = $numberOfDestinations;
        $this->latitude             = $latitude;
        $this->language             = $language;
        $this->timezone             = $timezone;
        $this->topDestinations      = $topDestinations;
        $this->cityUfi              = $cityUfi;
        $this->numberOfHotels       = $numberOfHotels;
        $this->longitude            = $longitude;
        $this->label                = $label;
        $this->countryName          = $countryName;
        $this->country              = $country;
        $this->type                 = $type;
        $this->name                 = $name;
    }

    public static function fromArray(array $array): AutoComplete
    {
        $endorsements = isset($array['endorsements'])
            ? array_map(function (array $endorsementArray) {
                return Endorsement::fromArray($endorsementArray);
            }, $array['endorsements']) : null;
        $forecast     = isset($array['forecast'])
            ? Forecast::fromArray($array['forecast']) : null;

        return new self($array['right-to-left'], $array['region'],
            $array['url'], $endorsements, $array['id'], $array['city_name'],
            $forecast, $array['nr_dest'], $array['latitude'],
            $array['language'], $array['timezone'], $array['top_destinations'],
            $array['city_ufi'], $array['nr_hotels'], $array['longitude'],
            $array['label'], $array['country_name'], $array['country'],
            $array['type'], $array['name']);
    }

    /**
     * @return int
     */
    public function getRightToLeft(): int
    {
        return $this->rightToLeft;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return Endorsement[]|null
     */
    public function getEndorsements(): ? array
    {
        return $this->endorsements;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @return Forecast|null
     */
    public function getForecast(): ? Forecast
    {
        return $this->forecast;
    }

    /**
     * @return int
     */
    public function getNumberOfDestinations(): int
    {
        return $this->numberOfDestinations;
    }

    /**
     * @return string
     */
    public function getLatitude(): string
    {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @return array
     */
    public function getTopDestinations(): array
    {
        return $this->topDestinations;
    }

    /**
     * @return string
     */
    public function getCityUfi(): string
    {
        return $this->cityUfi;
    }

    /**
     * @return int
     */
    public function getNumberOfHotels(): int
    {
        return $this->numberOfHotels;
    }

    /**
     * @return string
     */
    public function getLongitude(): string
    {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}