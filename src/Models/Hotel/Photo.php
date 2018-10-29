<?php

namespace BookingCom\Models\Hotel;

use BookingCom\Models\AutoTag;

class Photo extends \BookingCom\Models\Photo
{

    /**
     * @var bool
     */
    private $isLogo;

    /**
     * HotelPhoto constructor.
     * @param bool     $isMain
     * @param bool     $isLogo
     * @param array    $urls
     * @param string[] $tags
     * @param array    $autoTags
     */
    public function __construct(bool $isMain, bool $isLogo, array $urls, array $tags, array $autoTags)
    {
        parent::__construct($isMain, $urls, $tags, $autoTags);
        $this->isLogo = $isLogo;
    }

    public static function fromArray(array $array): self
    {
        $urls = [self::SIZE_ORIGINAL => $array['url_original']];

        if (isset($array['url_max300'])) {
            $urls[self::SIZE_MAX_300] = $array['url_max300'];
        }

        if (isset($array['url_square60'])) {
            $urls[self::SIZE_SQUARE_60] = $array['url_square60'];
        }

        $isMain = $array['main_photo'] ?? false;
        $isLogo = $array['is_logo_photo'] ?? false;
        $tags = $array['tags'] ?? [];
        $autoTags = self::makeChildrenFromArray($array, AutoTag::class, 'auto_tags');

        return new static($isMain, $isLogo, $urls, $tags, $autoTags);
    }

    /**
     * @return bool
     */
    public function isLogo(): bool
    {
        return $this->isLogo;
    }
}
