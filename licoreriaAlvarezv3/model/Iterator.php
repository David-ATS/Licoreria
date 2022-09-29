<?php
	interface Iterator 
	{
	/* Métodos */
		  public function __construct($givenArray);
		  public function rewind();
		  public function current();
		  public function key();
		  public function next();
		  public function valid();
	}
?>