<?php
	class myiterator implements Iterator {
   	  private $myArray;
	 
	  
	  public function constructor( $givenArray ) {
		$this->myArray = $givenArray;
	  }
	  public function rewind() {
		return reset($this->myArray);
	  }
	  public function current() {
		return current($this->myArray);
	  }
	  public function key() {
		return key($this->myArray);
	  }
	  public function next() {
		return next($this->myArray);
	  }
	  public function valid() {
	  	if(key($this->myArray)==null)
		{
			return false;
		}
		else
		{
			return true;
		}
		
	  }
	}
?>