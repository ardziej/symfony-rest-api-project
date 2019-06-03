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
	private $httpCode;

	/**
	 * CountryService constructor.
	 *
	 * @param string $countryName
	 *
	 * @throws GuzzleException
	 */
	public function __construct( string $countryName ) {
		$this->country = new Country();
		$this->callRestCountries( $countryName );
	}

	/**
	 * @param string $countryName
	 *
	 * @throws GuzzleException
	 */
	private function callRestCountries( string $countryName ): void {
		$client = new Client( [ 'base_uri' => 'https://restcountries.eu/rest/v2/name/' ] );

		try {
			$response = $client->request( 'GET', $countryName );

			$body = json_decode( $response->getBody()->getContents(), false );
			$this->country->setName( $body{0}->name );
			$this->country->setNativeName( $body{0}->nativeName );
			$this->country->setCurrencyName( $body{0}->currencies[0]->code );
			$this->setHttpCode( 200 );

			$this->callNbp( $body{0}->currencies[0]->code );
		} catch ( ClientException $e ) {
			$exception = $e->getResponse();
			$this->setHttpCode( $exception->getStatusCode() );
			$this->setMessage( 'Country ' . $exception->getReasonPhrase() );
		} catch ( ServerException $e ) {
			$exception = $e->getResponse();
			$this->setHttpCode( $exception->getStatusCode() );
			$this->setMessage( $exception->getReasonPhrase() );
		}
	}

	/**
	 * @param string $currencyName
	 *
	 * @throws GuzzleException
	 */
	private function callNbp( string $currencyName ): void {
		$client = new Client( [
			'base_uri' => 'https://api.nbp.pl/api/exchangerates/rates/A/',
			'headers'  => [ 'Content-Type' => 'application/json', 'Accept' => 'application/json' ],
		] );

		try {
			$response = $client->request( 'GET', $currencyName );

			$body = json_decode( $response->getBody()->getContents(), false );
			$this->country->setCurrencyPrice( $body->rates[0]->mid );
		} catch ( ClientException $e ) {
			$exception = $e->getResponse();
			$this->setHttpCode( $exception->getStatusCode() );
			$this->setMessage( 'Currency ' . $exception->getReasonPhrase() );
		} catch ( ServerException $e ) {
			$exception = $e->getResponse();
			$this->setHttpCode( $exception->getStatusCode() );
			$this->setMessage( $exception->getReasonPhrase() );
		}
	}

	/**
	 * @return array
	 */
	public function getBody(): array {
		return [
			'message' => $this->getMessage(),
			'code'    => $this->getHttpCode(),
			'data'    => $this->country->toArray(),
		];
	}

	/**
	 * @return int
	 */
	public function getHttpCode(): int {
		return $this->httpCode;
	}

	/**
	 * @param int $httpCode
	 */
	public function setHttpCode( int $httpCode ): void {
		$this->httpCode = $httpCode;
	}

	/**
	 * @return mixed
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage( $message ): void {
		$this->message = $message;
	}

}