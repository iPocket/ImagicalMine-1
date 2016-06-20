<?php
/*
 *
 *  _                       _           _ __  __ _             
 * (_)                     (_)         | |  \/  (_)            
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___  
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \ 
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/ 
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___| 
 *                     __/ |                                   
 *                    |___/                                                                     
 * 
 * This program is a third party build by ImagicalMine.
 * 
 * PocketMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.ml/
 * 
 *
*/
namespace pocketmine\network\protocol;
#include <rules/DataPacket.h>
#ifndef COMPILE
#endif
use pocketmine\utils\BinaryStream;
use pocketmine\utils\Utils;
abstract class DataPacket extends BinaryStream{
	
	public static $pkKeys = array(
		0x03 => 0x03,
		0x01 => 0x8f,
		0x02 => 0x90,
		0x05 => 0x91,
		0x06 => 0x92,
		0x07 => 0x93,
		0x08 => 0x94,
		0x09 => 0x95,
		0x0a => 0x96,
	//	0x0b => 0x97,
		0x0b => 0x98,
		0x0c => 0x99,
		0x0d => 0x9a,
		0x0e => 0x9b,
		0x0f => 0x9c,
		0x10 => 0x9d,
		//
		0x12 => 0x9e,
		0x13 => 0x9f,
		0x14 => 0xa0,
		0x15 => 0xa1,
		0x16 => 0xa2, 
		0x17 => 0xa3,
		0x18 => 0xa4,
		0x19 => 0xa5,
		0x1a => 0xa6,
		0x1b => 0xa7,
		0x1c => 0xa8,
		//
		0x1e => 0xa9,
		0x1f => 0xaa,
		0x20 => 0xab,
		0x21 => 0xac,
		0x22 => 0xad,
		0x23 => 0xae,
		0x24 => 0xaf,
		0x25 => 0xb0,
		0x26 => 0xb1,
		0x27 => 0xb2,
		0x28 => 0xb3,
		0x29 => 0xb4,
		0x2a => 0xb5,
		0x2b => 0xb6,
		0x2c => 0xb7,
		0x2d => 0xb8,
		0x2e => 0xb9,
		0x2f => 0xba,
		0x30 => 0xbb,
		0x31 => 0xbc,
		0x32 => 0xbd,
		0x33 => 0xbe,
		0x34 => 0xbf,
		0x35 => 0xc0,
		0x36 => 0xc1,
		0x37 => 0xc2,
		0x38 => 0xc3,
		0x39 => 0xc4,
		0x3a => 0xc5,
		0x3b => 0xc6,
		0x3c => 0xc7,
		0x3d => 0xc8,
		0x3e => 0xc9,
	);
	
	public static $pkKeysRev = array(
		0x03 => 0x03,
		0x8f => 0x01,
		0x90 => 0x02,
		0x91 => 0x05,
		0x92 => 0x06,
		0x93 => 0x07,
		0x94 => 0x08,
		0x95 => 0x09,
		0x96 => 0x0a,
	//	0x97 => 0x0b,
		0x98 => 0x0b,
		0x99 => 0x0c,
		0x9a => 0x0d,
		0x9b => 0x0e,
		0x9c => 0x0f,
		0x9d => 0x10,
		//
		0x9e => 0x12,
		0x9f => 0x13,
		0xa0 => 0x14,
		0xa1 => 0x15,
		0xa2 => 0x16,
		0xa3 => 0x17,
		0xa4 => 0x18,
		0xa5 => 0x19,
		0xa6 => 0x1a,
		0xa7 => 0x1b, 
		0xa8 => 0x1c,
		//
		0xa9 => 0x1e,
		0xaa => 0x1f,
		0xab => 0x20,
		0xac => 0x21,
		0xad => 0x22,
		0xae => 0x23,
		0xaf => 0x24,
		0xb0 => 0x25,
		0xb1 => 0x26,
		0xb2 => 0x27,
		0xb3 => 0x28, 
		0xb4 => 0x29,
		0xb5 => 0x2a,
		0xb6 => 0x2b,
		0xb7 => 0x2c,
		0xb8 => 0x2d,
		0xb9 => 0x2e,
		0xba => 0x2f,
		0xbb => 0x30, 
		0xbc => 0x31,
		0xbd => 0x32,
		0xbe => 0x33, 
		0xbf => 0x34,
		0xc0 => 0x35,
		0xc1 => 0x36,
		0xc2 => 0x37,
		0xc3 => 0x38,
		0xc4 => 0x39,
		0xc5 => 0x3a,
		0xc6 => 0x3b,
		0xc7 => 0x3c,
		0xc8 => 0x3d,
		0xc9 => 0x3e,
	);
		
	const NETWORK_ID = 0;
	public $isEncoded = false;
	private $channel = 0;
	public function pid(){
		return $this::NETWORK_ID;
	}
	abstract public function encode();
	abstract public function decode();
	public function reset(){
		$this->buffer = chr($this::NETWORK_ID);
		$this->offset = 0;
	}
	/**
	 * @deprecated This adds extra overhead on the network, so its usage is now discouraged. It was a test for the viability of this.
	 */
	public function setChannel($channel){
		$this->channel = (int) $channel;
		return $this;
	}
	public function getChannel(){
		return $this->channel;
	}
	public function clean(){
		$this->buffer = null;
		$this->isEncoded = false;
		$this->offset = 0;
		return $this;
	}
	public function __debugInfo(){
		$data = [];
		foreach($this as $k => $v){
			if($k === "buffer"){
				$data[$k] = bin2hex($v);
			}elseif(is_string($v) or (is_object($v) and method_exists($v, "__toString"))){
				$data[$k] = Utils::printable((string) $v);
			}else{
				$data[$k] = $v;
			}
		}
		return $data;
	}
	
	public function updateBuffer($addChar) {
		if($addChar == chr(0xfe)) {
			$pkId = ord($this->buffer{0});
			if(isset(self::$pkKeysRev[$pkId])) {
				$this->buffer{0} = chr(self::$pkKeysRev[$pkId]);
			}
		}
	}
}
