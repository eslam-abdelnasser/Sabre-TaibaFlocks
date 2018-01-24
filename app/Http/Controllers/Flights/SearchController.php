<?php

namespace App\Http\Controllers\Flights;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Third_Party\Saber;
use App\Third_Party\SabreParsing ;
class SearchController extends Controller
{
    //

    public function index()
    {

        $data = $this->checkAvailability() ;
        $flightSegment = $this->flightSegment($data) ;
        dd($flightSegment);

    }


    public function checkAvailability()
    {
        $saber = new Saber();

        $token = $saber->soapOpenSession();

        $body = '<OTA_AirAvailRQ xmlns="http://webservices.sabre.com/sabreXML/2011/10" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" Version="2.4.0">
         <OriginDestinationInformation>
            <FlightSegment DepartureDateTime="01-23T09:00">
               <DestinationLocation LocationCode="CMH" />
               <OriginLocation LocationCode="DFW" />
            </FlightSegment>
         </OriginDestinationInformation>
      </OTA_AirAvailRQ>' ;


        $availability =  new SabreParsing('OTA_AirAvailLLSRQ',$body,$token) ;

        $data = $availability->get_response() ;


        return $data ;
    }

    public function flightSegment($response)
    {
        foreach ($response->OTA_AirAvailRS->OriginDestinationOptions->OriginDestinationOption as $item){
            $info [] = $item->FlightSegment ;
        }


        return $info ;
    }
}
