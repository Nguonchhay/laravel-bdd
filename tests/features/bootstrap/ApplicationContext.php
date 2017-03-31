<?php
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Laracasts\TestDummy\Factory;
use App\User;

/**
 * Defines application features from the specific context.
 */
class ApplicationContext extends RawMinkContext implements Context {

	use DatabaseMigrations;

	/**
	 * @var \BaseTestCase
	 */
	protected $baseTestCase;



	/**
	 * Initializes context.
	 * Every scenario gets its own context instance.
	 * You can also pass arbitrary arguments to the
	 * context constructor through behat.yml.
	 *
	 * @param $fixturePath
	 */
	public function __construct() {
		$this->baseTestCase = new BaseTestCase();
	}

	/**
	 * @param BeforeScenarioScope $scope
	 *
	 * @BeforeScenario @fixtures
	 */
	public function before(BeforeScenarioScope $scope) {
		$this->baseTestCase->artisan('migrate:rollback');
		$this->baseTestCase->artisan('migrate');
		$this->baseTestCase->artisan('db:seed');
		$this->baseTestCase->setArtisan();
	}

	/**
	 * @param AfterScenarioScope $scope
	 *
	 * @AfterScenario
	 */
	public function after(AfterScenarioScope $scope) {
		/**
		 * Uncomment this line in order to clear database schema after finish testing
		 */
		//$this->baseTestCase->artisan('migrate:rollback');
	}

	/**
	 * @param $model
	 *
	 * @When /^the mock up data from "([^"]*)" model is loaded$/
	 */
	public function fixturesAreLoaded($model) {
		Factory::create($model);
	}

	/**
	 * @param $email
	 *
	 * @Given /^I am logged in as "([^"]*)"$/
	 */
	public function iAmLoggedInAs($email) {
		$user = User::where('email', $email)->first();
		$this->baseTestCase->be($user);
	}

	/**
	 * @param $email
	 *
	 * @Given /^a user called "([^"]*)" exists$/
	 */
	public function aUserCalledExists($email) {
		$user = factory(App\User::class)->create([
			'email' => $email,
		]);
	}
}
