<?php

$config = array(
	'property_add' => array(
		array(
			'field' => 'name',
			'label' => 'Please enter Property Name',
			'rules' => 'required'
		)
	),
	//Input Source Import
	'import_excel' => array(
		array(
			'field' => 'source_cat_id',
			'label' => 'Please enter Source Category id',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter Option Name',
			'rules' => 'required'
		)
	),
	//Country Import
	'country_import_excel' => array(
		array(
			'field' => 'name',
			'label' => 'Please enter Country Name',
			'rules' => 'required'
		)
	),
	//State Import
	'state_import_excel' => array(
		array(
			'field' => 'country_id',
			'label' => 'Please Select Country ',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter State Name',
			'rules' => 'required'
		)
	),
	//City Import
	'city_import_excel' => array(
		array(
			'field' => 'state_id',
			'label' => 'Please Select State',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter City Name',
			'rules' => 'required'
		)
	),
	//Area Import
	'area_import_excel' => array(
		array(
			'field' => 'city_id',
			'label' => 'Please Select City',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter Area Name',
			'rules' => 'required'
		)
	)
	
);
