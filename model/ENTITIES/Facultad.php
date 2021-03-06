<?php

class Facultad {

	protected $id;
	protected $nombre;

	public function __construct($id, $nombre){
		$this->id = $id;
		$this->nombre = $nombre;
	}

	public function getid(){
		return $this->id;
	}

	public function setid($id){
		$this->id = $id;
		return $this;
	}
	public function getnombre(){
		return $this->nombre;
	}

	public function setnombre($nombre){
		$this->nombre = $nombre;
		return $this;
	}

	public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}