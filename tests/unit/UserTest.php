<?php
    // ./vendor/bin/phpunit
    use PHPUnit\Framework\TestCase;

    class UserTest extends TestCase {
        // using @ test removes the need to have test before the funcs names
        /** @test */
        public function canSetTheFirstName() {
            $user = new \App\Models\User;
            $user->setFirstName('Billy');
            $this->assertEquals($user->getFirstName(), 'Billy');
        }

        public function testThatCanSetTheLasttName() {
            $user = new \App\Models\User;
            $user->setLastName('Test');
            $this->assertEquals($user->getLastName(), 'Test');
        }

        public function testReturnFullName()
        {   
            $user = new \App\Models\User;
            $user->setFirstName('Test');
            $user->setLastName('Mann');
            $this->assertEquals($user->getFullName(), 'Test Mann');
        }

        public function testFirstAndLastNameAreTrimmed()
        {
            $user = new \App\Models\User;
            $user->setFirstName('Test   ');
            $user->setLastName('  Mann');
            $this->assertEquals($user->first_name, 'Test');
            $this->assertEquals($user->last_name, 'Mann');
        }

        public function testEmailAddressCanBeSet() {
            $user = new \App\Models\User;
            $user->setEmail('test@test.com');
            $this->assertEquals($user->getEmail(), 'test@test.com');
        }

        public function testEmailVariablesContainCorrectValues()
        {
            $user = new \App\Models\User;
            $user->setFirstName('Test');
            $user->setLastName('Mann');
            $user->setEmail('test@test.com');

            $emailVariables = $user->getEmailVariables();

            $this->assertArrayHasKey('full_name', $emailVariables);
            $this->assertArrayHasKey('email', $emailVariables);

            $this->assertEquals($emailVariables['full_name'], 'Test Mann');
            $this->assertEquals($emailVariables['email'], 'test@test.com');
        }
    }
