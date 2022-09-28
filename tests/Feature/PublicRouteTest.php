<?php

it('has home page')->get('/')->assertStatus(200);

it('has courses page')->get('/courses')->assertStatus(200);

it('has calendar page')->get('/calendar')->assertStatus(200);

it('has community page')->get('/community')->assertStatus(200);

it('has about page')->get('/about')->assertStatus(200);
