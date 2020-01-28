<?php

$data = Users::GoogleAuth();

App::get('database')->GLogin($data->email);