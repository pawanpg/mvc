<?php

class HomeModel extends Model
{
	private $_airport;
	
	public function setUserName($airport)
	{
		$this->_airport = $airport;
	}
	
	public function _geturldata($url)
    {
		
		$sql = "SELECT u.id, u.url, u.type, u.rid, u.title FROM url u WHERE u.url = '".$url."' and u.status=1";

		$this->_setSql($sql);
		$urldata = $this->getRow(array($id));
		
		if (empty($urldata))
		{
				return false;
		}

		return $urldata;
    }
	
	public function _getairportslist()
	{
		
		$sql = "SELECT * FROM airports where status=1";
		
		$this->_setSql($sql);
		$airportslist = $this->getAll();
		
		if (empty($airportslist))
		{
				return false;
		}

		return $airportslist;
	}
	
	public function _getairportdata($rid)
    {
		
		
		$sql = "SELECT a.* FROM airports a WHERE a.aid = '".$rid."'";
		
		$this->_setSql($sql);
		$airportdata = $this->getRow(array($rid));
		
		if (empty($airportdata))
		{
				return false;
		}

		return $airportdata;
    }
	
	public function _getlistofparkinglotsdata($aid)
    {
		
		
		$sql = "SELECT p.*, pr.ourprice, u.url FROM parkinglots p JOIN price pr ON p.pid = pr.pid JOIN url u ON p.pid = u.rid WHERE p.aid = '".$aid."' and u.main=1 and u.type='p' and p.status=1";
		
		$this->_setSql($sql);
		$listofparkinglotsdata = $this->getAll();
		
		if (empty($listofparkinglotsdata))
		{
				return false;
		}

		return $listofparkinglotsdata;
    }
	
	public function _getparkinglotdata($rid)
    {
		
		
		$sql = "SELECT p.*, pr.ourprice, a.code as acode, a.name as aname FROM parkinglots p JOIN price pr ON p.pid = pr.pid JOIN airports a ON p.aid = a.aid WHERE p.pid = '".$rid."' and p.status=1";
		
		$this->_setSql($sql);
		$parkinglotdata = $this->getRow(array($rid));
		
		if (empty($parkinglotdata))
		{
				return false;
		}

		return $parkinglotdata;
    }
	
	public function _getparkinglotimagesdata($rid)
    {		
		
		$sql = "SELECT pi.*  FROM parkinglotimages pi WHERE pi.pid = '".$rid."' and pi.status=1";
		
		$this->_setSql($sql);
		$parkinglotimagesdata = $this->getAll(array($rid));
		
		if (empty($parkinglotimagesdata))
		{
				return false;
		}

		return $parkinglotimagesdata;
    }
	
}