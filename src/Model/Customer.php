<?php
/**
 * Customer
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

namespace Nitsmax\Client\Model;

use \ArrayAccess;

/**
 * Customer Class Doc Comment
 *
 * @category    Class */
 // @description Customer model
/** 
 * @package     Nitsmax\Client
 * @author      http://github.com/nitsmax-api/nitsmax-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/nitsmax-api/nitsmax-codegen
 */
class Customer implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $nitsmaxModelName = 'Customer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $nitsmaxTypes = array(
        'id' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'address_line' => 'string',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'zip' => 'string',
        'membership' => '\Nitsmax\Client\Model\CustomerMembership',
        'created_date' => 'string',
        'updated_date' => 'string'
    );

    public static function nitsmaxTypes()
    {
        return self::$nitsmaxTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'id' => 'id',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'email' => 'email',
        'phone_number' => 'phoneNumber',
        'address_line' => 'addressLine',
        'city' => 'city',
        'state' => 'state',
        'country' => 'country',
        'zip' => 'zip',
        'membership' => 'membership',
        'created_date' => 'createdDate',
        'updated_date' => 'updatedDate'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'id' => 'setId',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'email' => 'setEmail',
        'phone_number' => 'setPhoneNumber',
        'address_line' => 'setAddressLine',
        'city' => 'setCity',
        'state' => 'setState',
        'country' => 'setCountry',
        'zip' => 'setZip',
        'membership' => 'setMembership',
        'created_date' => 'setCreatedDate',
        'updated_date' => 'setUpdatedDate'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'id' => 'getId',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'email' => 'getEmail',
        'phone_number' => 'getPhoneNumber',
        'address_line' => 'getAddressLine',
        'city' => 'getCity',
        'state' => 'getState',
        'country' => 'getCountry',
        'zip' => 'getZip',
        'membership' => 'getMembership',
        'created_date' => 'getCreatedDate',
        'updated_date' => 'getUpdatedDate'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['first_name'] = isset($data['first_name']) ? $data['first_name'] : null;
        $this->container['last_name'] = isset($data['last_name']) ? $data['last_name'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['phone_number'] = isset($data['phone_number']) ? $data['phone_number'] : null;
        $this->container['address_line'] = isset($data['address_line']) ? $data['address_line'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['zip'] = isset($data['zip']) ? $data['zip'] : null;
        $this->container['membership'] = isset($data['membership']) ? $data['membership'] : null;
        $this->container['created_date'] = isset($data['created_date']) ? $data['created_date'] : null;
        $this->container['updated_date'] = isset($data['updated_date']) ? $data['updated_date'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        if ($this->container['id'] === null) {
            $invalid_properties[] = "'id' can't be null";
        }
        if ($this->container['first_name'] === null) {
            $invalid_properties[] = "'first_name' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        if ($this->container['id'] === null) {
            return false;
        }
        if ($this->container['first_name'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets id
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param string $id Customer identifier.
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets first_name
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     * @param string $first_name Customer first name.
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     * @param string $last_name Customer last name.
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets email
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     * @param string $email Customer email.
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets phone_number
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     * @param string $phone_number Customer phone number.
     * @return $this
     */
    public function setPhoneNumber($phone_number)
    {
        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets address_line
     * @return string
     */
    public function getAddressLine()
    {
        return $this->container['address_line'];
    }

    /**
     * Sets address_line
     * @param string $address_line Customer address address_line.
     * @return $this
     */
    public function setAddressLine($address_line)
    {
        $this->container['address_line'] = $address_line;

        return $this;
    }

    /**
     * Gets city
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     * @param string $city Customer address city.
     * @return $this
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets state
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param string $state Customer address state.
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets country
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     * @param string $country Customer address country.
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets zip
     * @return string
     */
    public function getZip()
    {
        return $this->container['zip'];
    }

    /**
     * Sets zip
     * @param string $zip Customer address zip.
     * @return $this
     */
    public function setZip($zip)
    {
        $this->container['zip'] = $zip;

        return $this;
    }

    /**
     * Gets membership
     * @return \Nitsmax\Client\Model\CustomerMembership
     */
    public function getMembership()
    {
        return $this->container['membership'];
    }

    /**
     * Sets membership
     * @param \Nitsmax\Client\Model\CustomerMembership $membership
     * @return $this
     */
    public function setMembership($membership)
    {
        $this->container['membership'] = $membership;

        return $this;
    }

    /**
     * Gets created_date
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->container['created_date'];
    }

    /**
     * Sets created_date
     * @param string $created_date Customer created on date.
     * @return $this
     */
    public function setCreatedDate($created_date)
    {
        $this->container['created_date'] = $created_date;

        return $this;
    }

    /**
     * Gets updated_date
     * @return string
     */
    public function getUpdatedDate()
    {
        return $this->container['updated_date'];
    }

    /**
     * Sets updated_date
     * @param string $updated_date Customer updated on date.
     * @return $this
     */
    public function setUpdatedDate($updated_date)
    {
        $this->container['updated_date'] = $updated_date;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Nitsmax\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Nitsmax\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


