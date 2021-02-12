<?php

Route::get('colors',"SystemController@colorSchema")->name('system.colors');
Route::put('colors',"SystemController@saveColorSchema")->name('system.save.colors');
Route::get('translates',"TranslateController@index")->name('system.translates');
Route::put('translates',"TranslateController@updateTranslates")->name('system.translates.update');
