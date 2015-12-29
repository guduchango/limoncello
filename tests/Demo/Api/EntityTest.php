<?php namespace DemoTests\Api;

use \DemoTests\BaseTestCase;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class EntityTest extends BaseTestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Laravel 5');
    }

//    /** API URL */
//    const API_URL = 'api/v1/entities/';
//
//    /**
//     * Test index and show authors.
//     */
//    public function testGetAll()
//    {
//        /** @var Response $response */
//        $response = $this->callGet(self::API_URL);
//        $this->assertResponseOk();
//        $this->assertNotEmpty($collection = json_decode($response->getContent()));
//        foreach ($collection->data as $obj) {
//            $response = $this->callGet(self::API_URL . $obj->id);
//            $this->assertResponseOk();
//            $this->assertNotNull($item = json_decode($response->getContent()));
//            $this->assertEquals($obj->id, $item->data->id);
//        }
//    }
//
//    /**
//     * Test store, update and delete.
//     */
//    public function testStoreUpdateAndDelete()
//    {
//        $requestBody = <<<EOT
//        {
//          "data" : {
//            "type" : "entities",
//            "attributes" : {
//              "company_id"   : "1",
//              "name": "entity_1",
//              "contact_name" : "contact_name_1",
//              "document" : "document_1",
//              "street_name" : "street_name_1",
//              "street_number" : "1",
//              "email" : "email.person@gmail.com",
//              "phone" : "260442610",
//              "pricelist_id" : "1",
//              "type" : "subdist",
//              "tax_id" : "1",
//            }
//          }
//        }
//EOT;
//
//        // Create
//        $response = $this->callPost(self::API_URL, $requestBody);
//
//        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
//        $this->assertNotNull($obj = json_decode($response->getContent())->data);
//        $this->assertNotEmpty($obj->id);
//        //$this->assertNotEmpty($obj->headers->get('Location'));
//
//
//        // re-read and check
//        $this->assertNotNull($obj = json_decode($this->callGet(self::API_URL . $obj->id)->getContent())->data);
//        $this->assertEquals('entity_1', $obj->attributes->name);
//
//        // Update
//        $requestBody = "{
//          \"data\" : {
//            \"type\" : \"entities\",
//            \"id\"   : \"$obj->id\",
//            \"attributes\" : {
//              \"name\" : \"ReyeSofta\",
//              \"abbreviation\" : \"RS\",
//              \"user_id\" : \"1\",
//              \"description\" : \"sofware industry amedida\",
//              \"logo_extension\" : \".png\",
//              \"street_name\" : \"lopez y planesssssssssssss\",
//              \"street_number\" : \"765\",
//              \"phone\" : \"2604426107\"
//            }
//          }
//        }";
//        $response = $this->callPatch(self::API_URL . $obj->id, $requestBody);
//
//        $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());
//
//        // re-read and check
//        $this->assertNotNull($obj = json_decode($this->callGet(self::API_URL . $obj->id)->getContent())->data);
//        $this->assertEquals('sofware industry amedida', $obj->attributes->description);
//
//        // Delete
//        $response = $this->callDelete(self::API_URL . $obj->id);
//        $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());
//    }
}
