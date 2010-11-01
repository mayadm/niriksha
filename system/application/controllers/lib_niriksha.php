<?php

class Lib_niriksha extends Controller {

	function Lib_niriksha()
	{
		parent::Controller();	
	}
	
	function index()
	{
		echo "Hallo aku lib Melihatlihat";
	}
	
	function login($before)
	{
		redirect("/niriksha/$before");
	}
	
}
