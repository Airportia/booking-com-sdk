<?php

namespace BookingCom\Models;

class Country extends AbstractModel
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $country;

    /** @var  string */
    private $area;
    /**
     * @var Country\Translation[]
     */
    private $translations;

    public function __construct(string $name, string $country, string $area, array $translations)
    {
        $this->name = $name;
        $this->country = $country;
        $this->area = $area;
        $this->translations = $translations;
    }

    public static function fromArray(array $array): Country
    {
        $translations = self::makeChildrenFromArray($array, Country\Translation::class, 'translations');
        return new self($array['name'], $array['country'], $array['area'], $translations);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getArea(): string
    {
        return $this->area;
    }

    public function getAllTranslations(): array
    {
        return $this->translations;
    }

    public function getTranslation(string $language): ?Country\Translation
    {
        foreach ($this->translations as $translation) {
            if ($translation->getLanguage() === $language) {
                return $translation;
            }
        }

        return null;
    }
}
