<?php
declare( strict_types=1 );

namespace App\Entity;

/**
 * Class Country
 * @package App\Entity
 */
class Country {
	/**
	 * @var string
	 */
	private $name;
	/**
	 * @var string
	 */
	private $nativeName;
	/**
	 * @var string
	 */
	private $currencyName;
	/**
	 * @var float
	 */
	private $currencyPrice;

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( string $name ): void {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getNativeName(): string {
		return $this->nativeName;
	}

	/**
	 * @param string $nativeName
	 */
	public function setNativeName( string $nativeName ): void {
		$this->nativeName = $nativeName;
	}

	/**
	 * @return string
	 */
	public function getCurrencyName(): string {
		return $this->currencyName;
	}

	/**
	 * @param string $currencyName
	 */
	public function setCurrencyName( string $currencyName ): void {
		$this->currencyName = $currencyName;
	}

	/**
	 * @return float
	 */
	public function getCurrencyPrice(): float {
		return $this->currencyPrice;
	}

	/**
	 * @param float $currencyPrice
	 */
	public function setCurrencyPrice( float $currencyPrice ): void {
		$this->currencyPrice = $currencyPrice;
	}


}