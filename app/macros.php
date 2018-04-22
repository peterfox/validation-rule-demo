<?php

\Illuminate\Validation\Rule::macro('even', function () {
    return new \App\Rules\EvenNumberRule();
});