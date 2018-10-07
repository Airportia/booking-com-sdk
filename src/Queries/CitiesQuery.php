<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 08.10.18
 */

namespace BookingCom\Queries;


use Webmozart\Assert\Assert;

class CitiesQuery
{

    private $idIn;

    private $countryIn;

    private $extras = [];

    public function toArray(): array
    {
        $result = [];
        if ($this->idIn) {
            $result['city_ids'] = implode(',', $this->idIn);
        }
        if ($this->countryIn) {
            $result['countries'] = implode(',', $this->countryIn);
        }
        if ($this->extras) {
            $result['extras'] = implode(',', $this->extras);
        }
        return $result;
    }

    public function whereIdIn(array $values): self
    {
        Assert::allInteger($values);
        $this->idIn = $values;
        return $this;
    }

    public function whereCountryIn(array $values): self
    {
        Assert::allLength($values, 2);
        $this->countryIn = $values;
        return $this;
    }

    public function withLocation(): self
    {
        $this->addToExtras('location');
        return $this;
    }

    public function withTimezone(): self
    {
        $this->addToExtras('timezone');
        return $this;
    }

    private function addToExtras(string $value): void
    {
        if (!\in_array($value, $this->extras, true)) {
            $this->extras[] = $value;
        }
    }
}