<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 29.10.18
 */

namespace BookingCom\Traits;


use BookingCom\Models\Translation;

trait TranslationsTrait
{
    /** @var Translation[] */
    private $translations = [];

    public function getAllTranslations(): array
    {
        return $this->translations;
    }

    public function getTranslation(string $language): ?Translation
    {
        foreach ($this->translations as $translation) {
            if ($translation->getLanguage() === $language) {
                return $translation;
            }
        }

        return null;
    }
}