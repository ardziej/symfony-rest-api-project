<?php
declare( strict_types=1 );

namespace App\Controller;

use App\Service\CountryService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CountryController
 * @package App\Controller
 */
class CountryController {
	/**
	 * @param  string  $countryName
	 *
	 * @return Response
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getCountryAction( string $countryName ): Response {
		$countryService = new CountryService( $countryName );

		$responseData = [
			'message' => 'OK',
			'code'    => 200,
			'data'    => $countryService->getData(),
		];

		return new JsonResponse( $responseData, Response::HTTP_OK );
	}

}