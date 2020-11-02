<?php
    // ./vendor/bin/phpunit
    use PHPUnit\Framework\TestCase;

    class UserTest extends TestCase {

        protected $user;
        // setUp() is a phpUnit method which is called before each test
        public function setUp() : void
        {
            $this->user = new \App\Models\User;
        }

        // using @ test removes the need to have test before the funcs names
        /** @test */
        public function canSetTheFirstName() {
            $this->user->setFirstName('Billy');
            $this->assertEquals($this->user->getFirstName(), 'Billy');
        }

        public function testThatCanSetTheLasttName() {
            $this->user->setLastName('Test');
            $this->assertEquals($this->user->getLastName(), 'Test');
        }

        public function testReturnFullName()
        {   
            $this->user->setFirstName('Test');
            $this->user->setLastName('Mann');
            $this->assertEquals($this->user->getFullName(), 'Test Mann');
        }

        public function testFirstAndLastNameAreTrimmed()
        {
            $this->user->setFirstName('Test   ');
            $this->user->setLastName('  Mann');
            $this->assertEquals($this->user->first_name, 'Test');
            $this->assertEquals($this->user->last_name, 'Mann');
        }

        public function testEmailAddressCanBeSet() {
            $this->user->setEmail('test@test.com');
            $this->assertEquals($this->user->getEmail(), 'test@test.com');
        }

        public function testEmailVariablesContainCorrectValues()
        {
            $this->user->setFirstName('Test');
            $this->user->setLastName('Mann');
            $this->user->setEmail('test@test.com');

            $emailVariables = $this->user->getEmailVariables();

            $this->assertArrayHasKey('full_name', $emailVariables);
            $this->assertArrayHasKey('email', $emailVariables);

            $this->assertEquals($emailVariables['full_name'], 'Test Mann');
            $this->assertEquals($emailVariables['email'], 'test@test.com');
        }
    }
