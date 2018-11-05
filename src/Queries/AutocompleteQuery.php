<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 05.11.18
 */

namespace BookingCom\Queries;


use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\QueryFields\WithQueryField;
use BookingCom\Queries\Validators\IntegerValidator;

/**
 * @method $this setAffiliateId(int $id)
 * @method $this withEndorsements()
 * @method $this withThemes()
 * @method $this withForecast()
 * @method $this withTimezones()
 */
class AutocompleteQuery extends AbstractQuery
{

    /**
     * @var string
     */
    private $text;
    /**
     * @var string
     */
    private $language;

    public function __construct(string $text, string $language = 'en')
    {
        parent::__construct();
        $this->setText($text);
        $this->setLanguage($language);
    }

    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'affiliate_id' => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'extras' => [
                'operation' => [
                    WithQueryField::class,
                    ['values' => ['forecast', 'themes', 'endorsements', 'timezones']],
                ],
            ],
        ];
    }

    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    public function setLanguage(string $language)
    {
        $this->language = $language;
        return $this;
    }

    public function toArray(): array
    {
        return array_merge(['text' => $this->text, 'language' => $this->language], parent::toArray());
    }
}