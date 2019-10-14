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
class CountryController extends AbstractController {
	/**
	 * @param  string  $countryName
	 *
	 * @return Response
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getCountryAction( string $countryName ): Response {
		$countryService = new CountryService( $countryName );
		$response       = $this->responseFrame(
			'OK',
			Response::HTTP_OK,
			$countryService->getData()
		);

		return new JsonResponse( $response, Response::HTTP_OK );
	}

}