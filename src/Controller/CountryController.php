<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Country controller.
 * @Route("/api/v1/country", name="api_")
 */
class CountryController extends FOSRestController {
	/**
	 * @Rest\Get("/name/{countryName}")
	 *
	 * @param string $countryName
	 *
	 * @return Response
	 */
	public function getCountryAction( string $countryName ): Response {

		$data = new CountryService();

		/*		$data = [
					'name'          => $countryName,
					'nativeName'    => $countryName,
					'currencyName'  => $countryName,
					'currencyPrice' => $countryName,
				];*/

		return $this->handleView( $this->view( $data ) );
	}

}