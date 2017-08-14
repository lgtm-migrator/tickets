<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SettingsProfilePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/settings';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Assert that user can change profile information.
     *
     * @return void
     */
    public function updateProfile(Browser $browser,
        $firstName = null,
        $lastName = null,
        $email = null,
        $streetAddress = null,
        $postalCode = null,
        $postalOffice = null,
        $countryCode = null
    ) {
        $browser->type('@first_name', $firstName)
            ->type('@last_name', $lastName)
            ->type('@email', $email)
            ->type('@street_address', $streetAddress)
            ->type('@postal_code', $postalCode)
            ->type('@postal_office', $postalOffice)
            ->select('@country_code', $countryCode)
            ->press('Update');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * [1] If a CSS selector is not provided, Dusk will search for an input
     *     field with the given name attribute.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@first_name'               => '#first_name',
            '@last_name'                => '#last_name',
            '@email'                    => '#email',
            '@street_address'           => '#street_address',
            '@postal_code'              => '#postal_code',
            '@postal_office'            => '#postal_office',
            '@country_code'             => 'country_code', // [1]
        ];
    }
}