<?php
/*
 * Unit Testing about UserController.
 *
 * There are 2 tests as examples but we must add more.
 *
 * Please, improve it!!!
 *
 */
class UserControllerTest extends PHPUnit_Framework_TestCase
{
    public function testUserStatusIsNull() {
        $id = null;
        $this->assertNull($id);
    }

    public function testUserHasIDKeyInPOST() {
        $_POST = array(
            'id' => 1,
            'name' => 'Alex',
            'lastname' => 'Casaus Carmona',
            'status' => 0,
            'email' => 'testing@test.com'
        );

        $this->assertArrayHasKey('id', $_POST);
    }
}
