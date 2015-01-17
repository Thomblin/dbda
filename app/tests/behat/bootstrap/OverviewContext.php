<?php

use Behat\Behat\Exception\PendingException;
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Facades\DB;

/**
 * Features context.
 */
class OverviewContext extends MinkContext
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $config = isset($parameters['guzzle']) && is_array($parameters['guzzle']) ? $parameters['guzzle'] : [];
        $config['base_url'] = $parameters['base_url'];
        $this->client = new Client($config);
    }

    /**
     * @static
     * @beforeSuite
     */
    public static function bootstrapLaravel()
    {
        $unitTesting = true;
        $testEnvironment = getenv('TRAVIS') ? 'travis' : 'behat';

        $app = require_once __DIR__ . '/../../../../bootstrap/start.php';
        $app->boot();

        Artisan::call('migrate');
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');

    }

    /**
     * @Given /^I have a database table named "([^"]*)"$/
     */
    public function iHaveADatabaseTableNamed($tableName)
    {
        \Tests\Fixtures\Loader::createTable($tableName);
    }

    /**
     * @When /^I click on "#{0,1}([^"]*)" element$/
     */
    public function iClickOnElement($element)
    {
        $this->clickLink($element);
    }

    /**
     * @Then /^an ajax event triggers$/
     */
    public function anAjaxEventTriggers()
    {
        static $ajaxCalls = 0;

        ++$ajaxCalls;
        $this->getSession()->wait(1000, "({$ajaxCalls} === Ajax.finishedAjax)");
        usleep(1000);
    }

    /**
     * @Then /^I wait for a "([^"]*)" element$/
     */
    public function iWaitForAElement($element)
    {
        $self = $this;

        $this->anAjaxEventTriggers();

        $this->wait(function() use($element, $self) {
            $self->assertSession()->elementExists('css', $element);
            return true;
        });
    }

    /**
     * @param Closure $lambda
     * @param int $timeout
     *
     * @return bool
     * @throws Exception
     */
    public function wait (Closure $lambda, $timeout = 60)
    {
        for ($i = 0; $i < $timeout; $i++)
        {
            try {
                if ($lambda($this)) {
                    return true;
                }
            } catch (Exception $e) {
                // do nothing
            }

            sleep(1);
        }

        $backtrace = debug_backtrace();

        throw new Exception(
            "Timeout thrown by " . $backtrace[1]['class'] . "::" . $backtrace[1]['function'] . "()\n" .
            $backtrace[1]['file'] . ", line " . $backtrace[1]['line']
        );
    }
}
