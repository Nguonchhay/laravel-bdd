@fixtures
Feature: Login
	In order to prove that Behat works as intended
	We want to test the home page for a phrase

	Background:
		Given the mock up data from "App\User" model is loaded

	Scenario: Root Test
		When I am on the homepage
		Then I should see "News"
