<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
  use DatabaseMigrations;

  public function test_a_visitor_can_create_categories()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit('/categories/create')
        ->type('name', 'Science') // input mező name attribútum értéke
        ->click('input[type="submit"]')
        ->assertSee('Science');
    });
  }

  public function test_a_required_input_field_must_be_filled()
  {
    $this->browse(function (Browser $browser) {
      $messages = $browser
        ->visit('/categories/create')
        ->script("return document.querySelector('#nev').validationMessage");

      $this->assertEquals('Kérjük, töltse ki ezt a mezőt.', $messages[0]);
    });
  }
}
