<?php
/**
 * CustomerApi
 * PHP version 5
 *
 * @category Class
 * @package  Nitsmax\Client
 * @author   http://github.com/nitsmax-api/nitsmax-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/nitsmax-api/nitsmax-codegen
 */

/**
 * Rista Platform API
 *
 * Rista Platform API provides resource oriented URLs to work with your business data. Our API uses [JSON](http://www.json.org) for request and response. API errors are returned using standard HTTP response codes.  You will need the following to work with your business data using API * A registered and active business with Rista. Not registered? [Get it now](https://play.google.com/store/apps/details?id=com.ristaapps.business), register and activate your business * Sales Enterprise and API licence for your business. You can purchase these licences from Account Menu * An active API Key and Secret Key for your business. Admin can create an API Key from Access Menu. * All API endpoints require API Key in `x-api-key` header and a [JWT](http://jwt.io/)(JSON Web Token) in `x-api-token` header  **You need to generate a new JWT api token for each request.**  Prerequisites * API Key and Secret Key for your business, if you don't have one request admin to create one from Access Menu * Active Sales Enterprise and API Licence  JWT has three parts (header.payload.signature), refer this [link](http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html) to understand the specification and this [link](http://jwt.io/) to use a library to create a JWT  * header  ``` {\"alg\": \"HS256\", \"typ\": \"JWT\"} ```  Attribute | Description | Type | Required :-------: | ----------- | :--: | :-------: alg       | `HS256`(HMAC SHA-256) is the only supported algorithm. | string | Yes typ       | Type of token, use `JWT`      | string | Yes  * payload  ``` {\"iss\": \"Your API Key\", \"iat\": 1438167698, \"jti\": \"xyz_1438167698489\" } ```  Attribute   | Description                                                                          | Type    | Required :---------: | ------------------------------------------------------------------------------------ | :-----: | :-------: iss         | Issuer, populate with your API Key                                                   | string  | Yes iat         | Token issue time, time since epoch in **seconds**. Use JWT library to generate this. | integer | Yes jti         | JWT id to uniquely identify the request, **required** for `PUT,POST,DELETE` requests | string  | No  * signature  Using the selected algorithm for the API Key create a hash of combination of encoded header and payload.  ```  encodedString = base64UrlEncode(header) + \".\" + base64UrlEncode(payload) signature = HMACSHA256(encodedString, \"secret key\") //or signature = RSA256(encodedString, \"secret key\") ```  Generate a JWT and send it in **key** Header  ``` token = base64Encode(header) + \".\" + base64Encode(payload) + \".\" + signature curl -s -H \"x-api-key: Your API Key\" -H \"x-api-token: token\" https://api.ristaapps.com/v1/sale?invoice=123456 ```
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/nitsmax-api/nitsmax-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the nitsmax code generator program.
 * https://github.com/nitsmax-api/nitsmax-codegen
 * Do not edit the class manually.
 */

namespace Nitsmax\Client\Api;

use \Nitsmax\Client\Configuration;
use \Nitsmax\Client\ApiClient;
use \Nitsmax\Client\ApiException;
use \Nitsmax\Client\ObjectSerializer;

/**
 * CustomerApi Class Doc Comment
 *
 * @category Class
 * @package  Nitsmax\Client
 * @author   http://github.com/nitsmax-api/nitsmax-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/nitsmax-api/nitsmax-codegen
 */
class CustomerApi
{

    /**
     * API Client
     *
     * @var \Nitsmax\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Nitsmax\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Nitsmax\Client\ApiClient $apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://api.ristaapps.com/v1');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Nitsmax\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Nitsmax\Client\ApiClient $apiClient set the API client
     *
     * @return CustomerApi
     */
    public function setApiClient(\Nitsmax\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation customerGet
     *
     * Get customer information.
     *
     * @param string $id Customer identifier. (required)
     * @return \Nitsmax\Client\Model\Customer
     * @throws \Nitsmax\Client\ApiException on non-2xx response
     */
    public function customerGet($id)
    {
        list($response) = $this->customerGetWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation customerGetWithHttpInfo
     *
     * Get customer information.
     *
     * @param string $id Customer identifier. (required)
     * @return Array of \Nitsmax\Client\Model\Customer, HTTP status code, HTTP response headers (array of strings)
     * @throws \Nitsmax\Client\ApiException on non-2xx response
     */
    public function customerGetWithHttpInfo($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling customerGet');
        }
        // parse inputs
        $resourcePath = "/customer";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

        // query params
        if ($id !== null) {
            $queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('x-api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['x-api-key'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('x-api-token');
        if (strlen($apiKey) !== 0) {
            $headerParams['x-api-token'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Nitsmax\Client\Model\Customer',
                '/customer'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Nitsmax\Client\Model\Customer', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Nitsmax\Client\Model\Customer', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Nitsmax\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Nitsmax\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Nitsmax\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Nitsmax\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Nitsmax\Client\Model\Error', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

}