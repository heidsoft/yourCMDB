<?php
/********************************************************************
* This file is part of yourCMDB.
*
* Copyright 2013-2016 Michael Batz
*
*
* yourCMDB is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* yourCMDB is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with yourCMDB.  If not, see <http://www.gnu.org/licenses/>.
*
*********************************************************************/
namespace yourCMDB\config;

/**
* Main class for getting the configuration
* Singleton: use CmdbConfig::create() for getting an instance
* @author Michael Batz <michael@yourcmdb.org>
*/
class CmdbConfig
{


	//datastore configuration
	private $configDatastore;

	//object type configuration
	private $configObjectType;

	//view configuration
	private $configView;

	//data exchange configuration
	private $configDataExchange;

	//exporter configuration
	private $configExporter;

	//task scheduler configuration
	private $configTaskScheduler;

	//security configuration
	private $configSecurity;

	//labelprinter configuration
	private $configLabelprinter;

	//CmdbConfig object (for singleton pattern)
	private static $cmdbConfig;

	/**
	* creates a new CmdbConfig
	* @return CmdbConfig	CmdbConfig instance
	*/
	public static function create()
	{
		//check, if a CmdbConfig instance already exists
		if(CmdbConfig::$cmdbConfig == null)
		{
			CmdbConfig::$cmdbConfig = new CmdbConfig();
		}

		return CmdbConfig::$cmdbConfig;
	}

	/**
	* private constructor: Creates a new configuration object
	* Reads configuration from xml files and returns configuration objects
	*/
	private function __construct()
	{
		$configurationBase = realpath(dirname(__FILE__)."/../../../etc");
		$this->configDatastore = new DatastoreConfig("$configurationBase/datastore-configuration.xml");
		$this->configObjectType = new ObjectTypeConfig("$configurationBase/objecttype-configuration.xml");
		$this->configView = new ViewConfig("$configurationBase/view-configuration.xml");
		$this->configDataExchange = new DataExchangeConfig("$configurationBase/dataexchange-configuration.xml");
		$this->configExporter = new ExporterConfig("$configurationBase/exporter-configuration.xml");
		$this->configTaskScheduler = new TaskSchedulerConfig("$configurationBase/taskscheduler-configuration.xml");
		$this->configSecurity = new SecurityConfig("$configurationBase/security-configuration.xml");
		$this->configLabelprinter = new LabelprinterConfig("$configurationBase/labelprinter-configuration.xml");
	}


	/**
	* Returns a DatastoreConfig object
	*/
	public function getDatastoreConfig()
	{
		return $this->configDatastore;
	}

	/**
	* Returns a ObjectTypeConfig object
	*/
	public function getObjectTypeConfig()
	{
		return $this->configObjectType;
	}

	/**
	* Returns a ViewConfig object
	*/
	public function getViewConfig()
	{
		return $this->configView;
	}

	/**
	* Returns a DataExchangeConfig object
	*/
	public function getDataExchangeConfig()
	{
		return $this->configDataExchange;
	}

	/**
	* Returns a ExporterConfig object
	*/
	public function getExporterConfig()
	{
		return $this->configExporter;
	}

	/**
	* Returns a TaskSchedulerConfig object
	*/
	public function getTaskSchedulerConfig()
	{
		return $this->configTaskScheduler;
	}

	/**
	* Returns a SecurityConfig object
	*/
	public function getSecurityConfig()
	{
		return $this->configSecurity;
	}

	/**
	* Returns a LabelprinterConfig object
	*/
	public function getLabelprinterConfig()
	{
		return $this->configLabelprinter;
	}

}
?>
