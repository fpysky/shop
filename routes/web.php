<?php

Route::any("/{query?}", function ($query = '') {
    return view("index");
});
