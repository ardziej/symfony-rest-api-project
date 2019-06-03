<?php
declare( strict_types=1 );

namespace App\Service;

class CountryService {

	/**
	 * @var string
	 */
	private $countryName;

	/**
	 * CountryService constructor.
	 *
	 * @param string $countryName
	 */
	public function __construct( string $countryName ) {
		$this->setCountryName( $countryName );
	}

	/**
	 * @return string
	 */
	public function getCountryName(): string {
		return $this->countryName;
	}

	/**
	 * @param string $countryName
	 */
	public function setCountryName( string $countryName ): void {
		$this->countryName = $countryName;
	}


}