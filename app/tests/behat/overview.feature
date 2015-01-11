Feature: Overview
  In order to work with db dependencies
  As an admin user
  I need to be able to list tables and their contents

  Scenario: show all tables in a list
    Given I am on "/"
    And I have a database table named "countries"
    And I have a database table named "cities"
    Then I should see a "#maintable" element
    Then the "#maintable" element should contain "cities"
    Then the "#maintable" element should contain "countries"
