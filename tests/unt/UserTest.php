<?php
namespace App\Models;
class UserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function thatWeCanTheFirstName(){
        $user = new \App\Models\User;
        $user->setFirstName('John');
        $this->assertEquals($user->getFirstName(),'John');
    }

    /** @test */
    public function thatWeCanTheLastName(){
        $user = new \App\Models\User;
        $user->setLastName('Doe');
        $this->assertEquals($user->getLastName(),'Doe');
    }

    /** @test */
    public function fullNameIsReturned(){
        $user = new \App\Models\User;
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $this->assertEquals($user->getFullName(),'John Doe');
    }

    /** @test */
    public function firstNameAndLastNameAreTrimmed(){
        $user = new \App\Models\User;
        $user->setFirstName(' John    ');
        $user->setLastName('     Doe');
        $this->assertEquals($user->getFirstName(),'John');
        $this->assertEquals($user->getLastName(),'Doe');
    }

    /** @test */
    public function emailAddressCanBeSet(){
        $user = new \App\Models\User;
        $user->setEmail('john.doe@example.com');
        $this->assertEquals($user->getEmail(),'john.doe@example.com');
    }

    /** @test */
    public function emailAddressContainsCorrectVariables(){
        $user = new \App\Models\User;
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setEmail('john@example.com');
        $emailVariables = $user->getEmailVariables();
        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        $this->assertEquals($emailVariables['full_name'], 'John Doe');
        $this->assertEquals($emailVariables['email'], 'john@example.com');
    }
}
?>