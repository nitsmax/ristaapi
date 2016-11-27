<?php
/**
 * SaleOptions
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
 * SaleOptions Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Nitsmax\Client
 * @author      http://github.com/nitsmax-api/nitsmax-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/nitsmax-api/nitsmax-codegen
 */
class SaleOptions implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $nitsmaxModelName = 'Sale_options';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $nitsmaxTypes = array(
        'name' => 'string',
        'sku_code' => 'string',
        'quantity' => 'float',
        'unit_price' => 'float',
        'amount' => 'float'
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
        'name' => 'name',
        'sku_code' => 'skuCode',
        'quantity' => 'quantity',
        'unit_price' => 'unitPrice',
        'amount' => 'amount'
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
        'name' => 'setName',
        'sku_code' => 'setSkuCode',
        'quantity' => 'setQuantity',
        'unit_price' => 'setUnitPrice',
        'amount' => 'setAmount'
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
        'name' => 'getName',
        'sku_code' => 'getSkuCode',
        'quantity' => 'getQuantity',
        'unit_price' => 'getUnitPrice',
        'amount' => 'getAmount'
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['sku_code'] = isset($data['sku_code']) ? $data['sku_code'] : null;
        $this->container['quantity'] = isset($data['quantity']) ? $data['quantity'] : null;
        $this->container['unit_price'] = isset($data['unit_price']) ? $data['unit_price'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        if ($this->container['name'] === null) {
            $invalid_properties[] = "'name' can't be null";
        }
        if ($this->container['quantity'] === null) {
            $invalid_properties[] = "'quantity' can't be null";
        }
        if ($this->container['unit_price'] === null) {
            $invalid_properties[] = "'unit_price' can't be null";
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
        if ($this->container['name'] === null) {
            return false;
        }
        if ($this->container['quantity'] === null) {
            return false;
        }
        if ($this->container['unit_price'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name Item option name.
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets sku_code
     * @return string
     */
    public function getSkuCode()
    {
        return $this->container['sku_code'];
    }

    /**
     * Sets sku_code
     * @param string $sku_code Item option SKU Code.
     * @return $this
     */
    public function setSkuCode($sku_code)
    {
        $this->container['sku_code'] = $sku_code;

        return $this;
    }

    /**
     * Gets quantity
     * @return float
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     * @param float $quantity Item option quantity.
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets unit_price
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->container['unit_price'];
    }

    /**
     * Sets unit_price
     * @param float $unit_price Item option unit price.
     * @return $this
     */
    public function setUnitPrice($unit_price)
    {
        $this->container['unit_price'] = $unit_price;

        return $this;
    }

    /**
     * Gets amount
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     * @param float $amount Item option amount.
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

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

