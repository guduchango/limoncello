<?php namespace DemoTests\Api;

use \DemoTests\BaseTestCase;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PricelistTest extends BaseTestCase
{
    /** API URL */
    const API_URL = 'api/v1/pricelists/';

    /**
     * Test index and show authors.
     */
    public function testGetAll()
    {
        /** @var Response $response */
        $response = $this->callGet(self::API_URL);
        $this->assertResponseOk();
        $this->assertNotEmpty($collection = json_decode($response->getContent()));
        foreach ($collection->data as $obj) {
            $response = $this->callGet(self::API_URL . $obj->id);
            $this->assertResponseOk();
            $this->assertNotNull($item = json_decode($response->getContent()));
            $this->assertEquals($obj->id, $item->data->id);
        }
    }

    /**
     * Test store, update and delete.
     */
    public function testStoreUpdateAndDelete()
    {
        $requestBody = <<<EOT
        {
          "data" : {
            "type" : "pricelists",
            "attributes" : {
              "company_id"   : "1",
              "name": "pricelist_1"
            }
          }
        }
EOT;

        // Create
        $response = $this->callPost(self::API_URL, $requestBody);

        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        $this->assertNotNull($obj = json_decode($response->getContent())->data);
        $this->assertNotEmpty($obj->id);
        //$this->assertNotEmpty($obj->headers->get('Location'));


        // re-read and check
        $this->assertNotNull($obj = json_decode($this->callGet(self::API_URL . $obj->id)->getContent())->data);
        $this->assertEquals('pricelist_1', $obj->attributes->name);

        // Update
        $requestBody = "{
          \"data\" : {
            \"type\" : \"pricelists\",
            \"id\"   : \"$obj->id\",
            \"attributes\" : {
              \"company_id\" : \"1\",
              \"name\" : \"pricelist_2\"
            }
          }
        }";

        Log::info($requestBody);
        $response = $this->callPatch(self::API_URL . $obj->id, $requestBody);

        Log::info($response);

        $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());

        // re-read and check
        $this->assertNotNull($obj = json_decode($this->callGet(self::API_URL . $obj->id)->getContent())->data);
        $this->assertEquals('pricelist_2', $obj->attributes->name);

        // Delete
        $response = $this->callDelete(self::API_URL . $obj->id);
        $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());
    }
}
