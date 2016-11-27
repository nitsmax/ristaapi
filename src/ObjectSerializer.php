<?php
/**
 * ObjectSerializer
 *
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

namespace Nitsmax\Client;

/**
 * ObjectSerializer Class Doc Comment
 *
 * @category Class
 * @package  Nitsmax\Client
 * @author   http://github.com/nitsmax-api/nitsmax-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/nitsmax-api/nitsmax-codegen
 */
class ObjectSerializer
{

    /**
     * Serialize data
     *
     * @param mixed $data the data to serialize
     *
     * @return string serialized form of $data
     */
    public static function sanitizeForSerialization($data)
    {
        if (is_scalar($data) || null === $data) {
            return $data;
        } elseif ($data instanceof \DateTime) {
            return $data->format(\DateTime::ATOM);
        } elseif (is_array($data)) {
            foreach ($data as $property => $value) {
                $data[$property] = self::sanitizeForSerialization($value);
            }
            return $data;
        } elseif (is_object($data)) {
            $values = array();
            foreach (array_keys($data::nitsmaxTypes()) as $property) {
                $getter = $data::getters()[$property];
                if ($data->$getter() !== null) {
                    $values[$data::attributeMap()[$property]] = self::sanitizeForSerialization($data->$getter());
                }
            }
            return (object)$values;
        } else {
            return (string)$data;
        }
    }

    /**
     * Sanitize filename by removing path.
     * e.g. ../../sun.gif becomes sun.gif
     *
     * @param string $filename filename to be sanitized
     *
     * @return string the sanitized filename
     */
    public function sanitizeFilename($filename)
    {
        if (preg_match("/.*[\/\\\\](.*)$/", $filename, $match)) {
            return $match[1];
        } else {
            return $filename;
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the path, by url-encoding.
     *
     * @param string $value a string which will be part of the path
     *
     * @return string the serialized object
     */
    public function toPathValue($value)
    {
        return rawurlencode($this->toString($value));
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the query, by imploding comma-separated if it's an object.
     * If it's a string, pass through unchanged. It will be url-encoded
     * later.
     *
     * @param object $object an object to be serialized to a string
     *
     * @return string the serialized object
     */
    public function toQueryValue($object)
    {
        if (is_array($object)) {
            return implode(',', $object);
        } else {
            return $this->toString($object);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the header. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string $value a string which will be part of the header
     *
     * @return string the header string
     */
    public function toHeaderValue($value)
    {
        return $this->toString($value);
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the http body (form parameter). If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string $value the value of the form parameter
     *
     * @return string the form string
     */
    public function toFormValue($value)
    {
        if ($value instanceof \SplFileObject) {
            return $value->getRealPath();
        } else {
            return $this->toString($value);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the parameter. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string $value the value of the parameter
     *
     * @return string the header string
     */
    public function toString($value)
    {
        if ($value instanceof \DateTime) { // datetime in ISO8601 format
            return $value->format(\DateTime::ATOM);
        } else {
            return $value;
        }
    }

    /**
     * Serialize an array to a string.
     *
     * @param array  $collection       collection to serialize to a string
     * @param string $collectionFormat the format use for serialization (csv,
     * ssv, tsv, pipes, multi)
     *
     * @return string
     */
    public function serializeCollection(array $collection, $collectionFormat, $allowCollectionFormatMulti = false)
    {
        if ($allowCollectionFormatMulti && ('multi' === $collectionFormat)) {
            // http_build_query() almost does the job for us. We just
            // need to fix the result of multidimensional arrays.
            return preg_replace('/%5B[0-9]+%5D=/', '=', http_build_query($collection, '', '&'));
        }
        switch ($collectionFormat) {
            case 'pipes':
                return implode('|', $collection);

            case 'tsv':
                return implode("\t", $collection);

            case 'ssv':
                return implode(' ', $collection);

            case 'csv':
                // Deliberate fall through. CSV is default format.
            default:
                return implode(',', $collection);
        }
    }

    /**
     * Deserialize a JSON string into an object
     *
     * @param mixed  $data          object or primitive to be deserialized
     * @param string $class         class name is passed as a string
     * @param string $httpHeaders   HTTP headers
     * @param string $discriminator discriminator if polymorphism is used
     *
     * @return object an instance of $class
     */
    public static function deserialize($data, $class, $httpHeaders = null, $discriminator = null)
    {
        if (null === $data) {
            return null;
        } elseif (substr($class, 0, 4) === 'map[') { // for associative array e.g. map[string,int]
            $inner = substr($class, 4, -1);
            $deserialized = array();
            if (strrpos($inner, ",") !== false) {
                $subClass_array = explode(',', $inner, 2);
                $subClass = $subClass_array[1];
                foreach ($data as $key => $value) {
                    $deserialized[$key] = self::deserialize($value, $subClass, null, $discriminator);
                }
            }
            return $deserialized;
        } elseif (strcasecmp(substr($class, -2), '[]') == 0) {
            $subClass = substr($class, 0, -2);
            $values = array();
            foreach ($data as $key => $value) {
                $values[] = self::deserialize($value, $subClass, null, $discriminator);
            }
            return $values;
        } elseif ($class === 'object') {
            settype($data, 'array');
            return $data;
        } elseif ($class === '\DateTime') {
            // Some API's return an invalid, empty string as a
            // date-time property. DateTime::__construct() will return
            // the current time for empty input which is probably not
            // what is meant. The invalid empty string is probably to
            // be interpreted as a missing field/value. Let's handle
            // this graceful.
            if (!empty($data)) {
                return new \DateTime($data);
            } else {
                return null;
            }
        } elseif (in_array($class, array('void', 'bool', 'string', 'double', 'byte', 'mixed', 'integer', 'float', 'int', 'DateTime', 'number', 'boolean', 'object'))) {
            settype($data, $class);
            return $data;
        } elseif ($class === '\SplFileObject') {
            // determine file name
            if (array_key_exists('Content-Disposition', $httpHeaders) &&
                preg_match('/inline; filename=[\'"]?([^\'"\s]+)[\'"]?$/i', $httpHeaders['Content-Disposition'], $match)) {
                $filename = Configuration::getDefaultConfiguration()->getTempFolderPath() . sanitizeFilename($match[1]);
            } else {
                $filename = tempnam(Configuration::getDefaultConfiguration()->getTempFolderPath(), '');
            }
            $deserialized = new \SplFileObject($filename, "w");
            $byte_written = $deserialized->fwrite($data);
 
            if (Configuration::getDefaultConfiguration()->getDebug()) {
                error_log("[DEBUG] Written $byte_written byte to $filename. Please move the file to a proper folder or delete the temp file after processing.".PHP_EOL, 3, Configuration::getDefaultConfiguration()->getDebugFile());
            }

            return $deserialized;
        } else {
            // If a discriminator is defined and points to a valid subclass, use it.
            if (!empty($discriminator) && isset($data->{$discriminator}) && is_string($data->{$discriminator})) {
                $subclass = '\Nitsmax\Client\Model\\' . $data->{$discriminator};
                if (is_subclass_of($subclass, $class)) {
                    $class = $subclass;
                }
            }
            $instance = new $class();
            foreach ($instance::nitsmaxTypes() as $property => $type) {
                $propertySetter = $instance::setters()[$property];

                if (!isset($propertySetter) || !isset($data->{$instance::attributeMap()[$property]})) {
                    continue;
                }

                $propertyValue = $data->{$instance::attributeMap()[$property]};
                if (isset($propertyValue)) {
                    $instance->$propertySetter(self::deserialize($propertyValue, $type, null, $discriminator));
                }
            }
            return $instance;
        }
    }
}
