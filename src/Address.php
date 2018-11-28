<?php
/**
 * Created by PhpStorm.
 * User: breic
 * Date: 11/27/2018
 * Time: 3:59 PM
 */

namespace RWC\Shutterfly;


class Address
{
    /**
     * Address Company Name
     *
     * @var string|null
     */
    protected $company;

    /**
     * Addressee name.
     *
     * @var string
     */
    protected $name;

    /**
     * Address line 1
     *
     * @var string
     */
    protected $address1;

    /**
     * Address line 2.
     *
     * @var string|null
     */
    protected $address2;

    /**
     * Address city.
     *
     * @var string
     */
    protected $city;

    /**
     * Address region. State for US addresses, province for Canadian addresses.
     *
     * @var string|null
     */
    protected $region;

    /**
     * Address postal Code (US zip code)
     *
     * @var string|null
     */
    protected $postCode;

    /**
     * ISO-3166 two letter country code (e.g. US, GB).
     *
     * @var string
     */
    protected $countryCode;

    /**
     * Spelled-out name of country.
     *
     * @var string
     */
    protected $countryName;

    /**
     * Recipient’s telephone number; used for international orders, for customs
     * tax purposes. No specific format is expected.
     *
     * @var string|null
     */
    protected $telephone;

    /**
     * Address Company Name
     *
     * @return null|string Address Company Name
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Address Company Name
     *
     * @param null|string $company Address Company Name
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * Addressee name
     *
     * @return string Addressee name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Addressee name
     *
     * @param string $name Addressee name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Address line 1
     *
     * @return string Address line 1
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * Address line 1
     *
     * @param string $address1 Address line 1
     */
    public function setAddress1(string $address1): void
    {
        $this->address1 = $address1;
    }

    /**
     * Address line 2
     *
     * @return null|string Address line 2
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * Address line 2
     *
     * @param null|string $address2 Address line 2
     */
    public function setAddress2(?string $address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * Address city
     *
     * @return string Address city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Address city
     *
     * @param string $city Address city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * Address region. State for US addresses, province for Canadian addresses.
     *
     * @return null|string Address region. State for US addresses, province for Canadian addresses.
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * Address region. State for US addresses, province for Canadian addresses.
     *
     * @param null|string $region Address region.
     */
    public function setRegion(?string $region): void
    {
        $this->region = $region;
    }

    /**
     * Address postal Code (US zip code)
     *
     * @return null|string Address postal Code (US zip code)
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * Address postal Code (US zip code)
     *
     * @param null|string $postCode Address postal Code (US zip code)
     */
    public function setPostCode(?string $postCode): void
    {
        $this->postCode = $postCode;
    }

    /**
     * ISO-3166 two letter country code (e.g. US, GB).
     *
     * @return string ISO-3166 two letter country code (e.g. US, GB).
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * ISO-3166 two letter country code (e.g. US, GB).
     *
     * @param string $countryCode ISO-3166 two letter country code (e.g. US, GB).
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Spelled out name of country
     *
     * @return string Spelled out name of country
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * Spelled out name of country
     *
     * @param string $countryName Spelled out name of country
     */
    public function setCountryName(string $countryName): void
    {
        $this->countryName = $countryName;
    }

    /**
     * Recipient’s telephone number; used for international orders, for customs
     * tax purposes. No specific format is expected.
     *
     * @return null|string Recipient’s telephone number
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Recipient’s telephone number; used for international orders, for customs
     * tax purposes. No specific format is expected.
     *
     * @param null|string $telephone Recipient’s telephone number
     */
    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }
}
