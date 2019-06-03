<?php
declare( strict_types=1 );

namespace App\Controller;

use App\Service\CountryService;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Country controller.
 * @Route("/api/v1/country", name="api_")
 */
class CountryController extends AbstractFOSRestController {
	/**
	 * @Rest\Get("/name/{countryName}")
	 *
	 * @param string $countryName
	 *
	 * @return Response
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function getCountryAction( string $countryName ): Response {

		$countryService = new CountryService( $countryName );

		return $this->handleView( $this->view( $countryService->getBody(), $countryService->getStatusCode() ) );
	}

}