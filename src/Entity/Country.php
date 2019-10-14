<?php
declare( strict_types=1 );

namespace App\Entity;

/**
 * Class Country
 * @package App\Entity
 */
class Country {
	/**
	 * @var string|null
	 */
	private $name;
	/**
	 * @var string|null
	 */
	private $nativeName;
	/**
	 * @var string|null
	 */
	private $currencyName;
	/**
	 * @var float|null
	 */
	private $currencyPrice;

	/**
	 * @return string|null
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * @param  string|null  $name
	 */
	public function setName( ?string $name ): void {
		$this->name = $name;
	}

	/**
	 * @return string|null
	 */
	public function getNativeName(): ?string {
		return $this->nativeName;
	}

	/**
	 * @param  string|null  $nativeName
	 */
	public function setNativeName( ?string $nativeName ): void {
		$this->nativeName = $nativeName;
	}

	/**
	 * @return string|null
	 */
	public function getCurrencyName(): ?string {
		return $this->currencyName;
	}

	/**
	 * @param  string|null  $currencyName
	 */
	public function setCurrencyName( ?string $currencyName ): void {
		$this->currencyName = $currencyName;
	}

	/**
	 * @return float|null
	 */
	public function getCurrencyPrice(): ?float {
		return $this->currencyPrice;
	}

	/**
	 * @param  float|null  $currencyPrice
	 */
	public function setCurrencyPrice( ?float $currencyPrice ): void {
		$this->currencyPrice = $currencyPrice;
	}

	/**
	 * @return array
	 */
	public function toArray(): array {
		return [
			'name'          => $this->getName(),
			'nativeName'    => $this->getNativeName(),
			'currencyName'  => $this->getCurrencyName(),
			'currencyPrice' => $this->getCurrencyPrice(),
		];
	}

}