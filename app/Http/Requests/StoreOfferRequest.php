<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}

// {
//     "offerExperienceVersion": "V1",
//     "offerList": [
//       {
//         "creationDate": null,
//         "deliveryCutOffTimeEpoch": null,
//         "deliveryRequest": {
//           "deliveryRequestCount": 2,
//           "orderCount": 20
//         },
//         "endTime": 1676907000,
//         "expirationDate": 1676899800,
//         "hidden": false,
//         "isPriorityOffer": false,
//         "legalEntity": null,
//         "maxWorkload": 0,
//         "offerId": "Ok9mZmVySWQuRW5jcnlwdGlvbktleS02aGlZbDQAAACDDtWCQwmuLr49JJXLxG3mJYggsumKFJ9IzSyruJwG7xT90pCiMcJAkwwJW+6k3nNaxkr1rvzzP3b3PyA6KgD0pfDSC55Wrh5p4/pDRAHLSB5VfBw/Ttpg7LCARTeuhoJxD7kIa5GB+2LAwui8xuglfYL63m3YHHqFnrhH9U+BSE6M22kbtZzlUrGAjRx2aRyvuHVCdJmf0kEYtT+hzdsFVFDQ4GNfFuq9v8vqpYgorlo8Jwp5ZkajmTMGgdo0XDCD0qkXxC7XEh1jxDbBGrggT0/eNZVpJcVsd6Ms0Hpvsc/wS1U+NtbL/+4KR/XU5Tt7Hes9eTVaR9EOGfldonFWLYB+IVxPHGTnr+q5UwU/dT99jREdZEHdJYhMuqdvX1v9zBYMAE2ADBhoOgwqtCct/IPTB1fi7s6tR9VeBYSJcdDbQfmemB9S627ap8cCNDUtbZoo48CU2HFDjII82KuUT5kveq11mAl7WuMScmVJ5a6JJhw49xoF7dyfeWuxgVTrhkPlEOpx42EtLG0A49/JXe7m95M+RWfyYg1hxxdG47zgKxGgmww=|ePEvM5OrCIB0h6i4LCuSvLO1AagC7MVIq8GzzoZq3zc=",
//         "offerMetadata": null,
//         "offerType": "NON_EXCLUSIVE",
//         "rateInfo": {
//           "PriceDetails": null,
//           "currency": "USD",
//           "isSurge": false,
//           "priceAmount": 42,
//           "pricingUXVersion": "V2",
//           "projectedTips": 30,
//           "surgeMultiplier": null
//         },
//         "schedulingType": "BLOCK",
//         "serviceAreaId": "6413abc8-eddb-4b92-a9ca-8f2eb9759ba7",
//         "serviceTypeId": "amzn1.flex.st.v1.PuyOplzlR1idvfPkv5138g",
//         "serviceTypeMetadata": {
//           "modeOfTransportation": null,
//           "nameClassification": "STANDARD"
//         },
//         "startTime": 1676899800,
//         "startingLocation": {
//           "address": {
//             "address1": "",
//             "address2": null,
//             "address3": null,
//             "addressId": null,
//             "city": null,
//             "countryCode": null,
//             "name": null,
//             "phone": null,
//             "postalCode": null,
//             "state": null
//           },
//           "geocode": {
//             "latitude": 0,
//             "longitude": 0
//           },
//           "locationType": null,
//           "startingLocationName": ""
//         },
//         "status": "OFFERED",
//         "trIds": null
//       }
//     ],
//     "refreshInterval": 1000,
//     "refreshTimeout": 1800000
//   }
