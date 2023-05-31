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
	//District Import
	'district_import_excel' => array(
		array(
			'field' => 'state_id',
			'label' => 'Please Select State',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter District Name',
			'rules' => 'required'
		)
	),
	//Sub-District/City Import
	'subdistrict_import_excel' => array(
		array(
			'field' => 'district_id',
			'label' => 'Please Select District',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter Sub-District/City Name',
			'rules' => 'required'
		)
	),
	//Moje/Area Import
	'area_import_excel' => array(
		array(
			'field' => 'subdistrict_id',
			'label' => 'Please Select Sub-District/City',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Please enter Moje/Area Name',
			'rules' => 'required'
		),
		array(
			'field' => 'area_code',
			'label' => 'Please enter Area code',
			'rules' => 'required'
		)
	)
	
);
