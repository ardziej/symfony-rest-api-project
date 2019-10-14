<?php
declare( strict_types=1 );

namespace App\Service;

use App\Entity\Country;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;

class CountryService {

	/**
	 * @var Country
	 */
	private $country;
	/**
	 * @var string
	 */
	private $message;
	/**
	 * @var int
	 */
	private $statusCode;

	/**
	 * CountryService constructor.
	 *
	 * @param  string  $countryName
	 *
	 * @throws GuzzleException
	 */
	public function __construct( string $countryName ) {
		$this->country = new Country();
		if ( $this->callRestCountries( $countryName ) ) {
			$this->callNbp( $this->country->getCurrencyName() );
		}
	}

	/**
	 * @param  string  $countryName
	 *
	 * @return bool
	 * @throws GuzzleException
	 */
	private function callRestCountries( string $countryName ): bool {
		$client = new Client( [ 'base_uri' => 'https://restcountries.eu/rest/v2/name/' ] );

		try {
			$response = $client->request( 'GET', $countryName );

			$body = json_decode( $response->getBody()->getContents(), false );
			$this->country->setName( $body{0}->name );
			$this->country->setNativeName( $body{0}->nativeName );
			$this->country->setCurrencyName( $body{0}->currencies[0]->code );
			$this->setMessage( $response->getReasonPhrase() );
			$this->setStatusCode( $response->getStatusCode() );

			return true;
		} catch ( ClientException|ServerException $e ) {
			$exception = $e->getResponse();
			$this->setStatusCode( $exception->getStatusCode() );
			$this->setMessage( 'Country ' . $exception->getReasonPhrase() );

			return false;
		}
	}

	/**
	 * @param  string  $currencyName
	 *
	 * @return bool
	 * @throws GuzzleException
	 */
	private function callNbp( string $currencyName ): bool {
		$client = new Client( [
			'base_uri' => 'https://api.nbp.pl/api/exchangerates/rates/A/',
			'headers'  => [ 'Content-Type' => 'application/json', 'Accept' => 'application/json' ],
		] );

		try {
			$response = $client->request( 'GET', $currencyName );

			$body = json_decode( $response->getBody()->getContents(), false );
			$this->country->setCurrencyPrice( $body->rates[0]->mid );
			$this->setMessage( $response->getReasonPhrase() );
			$this->setStatusCode( $response->getStatusCode() );

			return true;
		} catch ( ClientException|ServerException $e ) {
			$exception = $e->getResponse();
			$this->setStatusCode( $exception->getStatusCode() );
			$this->setMessage( 'Currency ' . $exception->getReasonPhrase() );

			return false;
		}
	}

	/**
	 * @return array
	 */
	public function getBody(): array {
		return [
			'message' => $this->getMessage(),
			'code'    => $this->getStatusCode(),
			'data'    => $this->country->toArray(),
		];
	}

	/**
	 * @return array
	 */
	public function getData(): array {
		return $this->country->toArray();
	}

	/**
	 * @return string
	 */
	public function getMessage(): string {
		return $this->message;
	}

	/**
	 * @param  string  $message
	 */
	public function setMessage( string $message ): void {
		$this->message = $message;
	}

	/**
	 * @return int
	 */
	public function getStatusCode(): int {
		return $this->statusCode;
	}

	/**
	 * @param  int  $statusCode
	 */
	public function setStatusCode( int $statusCode ): void {
		$this->statusCode = $statusCode;
	}

}