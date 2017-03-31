<?php

//namespace Feature\Bootstrap;

use Tests\TestCase;
use Illuminate\Contracts\Console\Kernel;

class BaseTestCase extends TestCase {

	public function __construct() {
		parent::setUp();
	}

	public function setArtisan($value = null) {
		$this->app[Kernel::class]->setArtisan(NULL);
	}
}
