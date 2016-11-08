<?php
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */

class ToolkitVersionComparator {
	public static function compare($a, $b) {
		do {
			$va = new ToolkitVersionPart();
			$vb = new ToolkitVersionPart();
			$a = self::parseVersionPart($a, $va);
			$b = self::parseVersionPart($b, $vb);
			
			$result = self::compareVersionPart($va, $vb);
			
			if ($result != 0){
				break;
			}
		}
		while ($a != null || $b != null);
		
		return $result;
	}
	
	
	private static function parseVersionPart($aVersion, ToolkitVersionPart $result) {
		if ($aVersion === null || strlen($aVersion) == 0) {
			return $aVersion;
		}
		
		$tok = explode(".", trim($aVersion));
		$part = $tok[0];
		
		if ($part == "*") {
			$result->numA = 9999999999;
			$result->strB = "";
		}
		else {
			$vertok = new ToolkitVersionPartTokenizer($part);
			$next = $vertok->nextToken();
			if (is_numeric($next)){
				$result->numA = $next;
			}
			else {
				$result->numA = 0;
			}
			
			if ($vertok->hasMoreElements()) {
				$str = $vertok->nextToken();
				// if part is of type "<num>+"
				if ($str[0] == '+') {
					$result->numA++;
					$result->strB = "pre";
				}
				else {
					// else if part is of type "<num><alpha>..."
					$result->strB = $str;
					
					if ($vertok->hasMoreTokens()) {
						$next = $vertok->nextToken();
						if (is_numeric($next)){
							$result->numC = $next;
						}
						else {
							$result->numC = 0;
						}
						if ($vertok->hasMoreTokens()) {
							$result->extraD = $vertok->getRemainder();
						}
					}
				}
			}
		}
		
		if (sizeOf($tok)>1) {
			// return everything after "."
			return substr($aVersion, strlen($part) + 1);
		}
		return null;
	}
	
	
	private static function compareVersionPart(ToolkitVersionPart $va, ToolkitVersionPart $vb) {
		$res = self::compareInt($va->numA, $vb->numA);
		if ($res != 0) {
			return $res;
		}
		
		$res = self::compareString($va->strB, $vb->strB);
		if ($res != 0) {
			return $res;
		}
		
		$res = self::compareInt($va->numC, $vb->numC);
		if ($res != 0) {
			return $res;
		}
		
		return self::compareString($va->extraD, $vb->extraD);
	}
	
	
	private static function compareInt($n1, $n2) {
		return $n1 - $n2;
	}
	
	
	private static function compareString($str1, $str2) {
		// any string is *before* no string
		if ($str1 === null) {
			return ($str2 !== null) ? 1 : 0;
		}
		
		if ($str2 === null) {
			return -1;
		}
		
		return strcmp($str1, $str2);
	}

	
}


class ToolkitVersionPart {
	public $numA = 0;
	public $strB = null;
	public $numC = 0;
	public $extraD = null;
}


/**
 * Specialized tokenizer for Mozilla version strings.  A token can
 * consist of one of the four sections of a version string:
 * <number-a><string-b><number-c><string-d (everything else)>
 */
class ToolkitVersionPartTokenizer {
	private $part = '';
	
	
	public function __construct($aPart) {
		$this->part = $aPart;
	}
	
	
	public function hasMoreElements() {
		return strlen($this->part) != 0;
	}
	
	
	public function hasMoreTokens() {
		return strlen($this->part) != 0;
	}
	
	
	public function nextElement() {
		if (preg_match('/^[\+\-]?[0-9].*/', $this->part)) {
			// if string starts with a number...
			$index = 0;
			if ($this->part[0] == '+' || $this->part[0] == '-') {
				$index = 1;
			}
			while (($index < strlen($this->part)) && is_numeric($this->part[$index])) {
				$index++;
			}
			$numPart = substr($this->part, 0, $index);
			$this->part = substr($this->part, $index);
			return $numPart;
		}
		else {
			// ... or if this is the non-numeric part of version string
			$index = 0;
			while (($index < strlen($this->part)) && !is_numeric($this->part[$index])) {
				$index++;
			}
			$alphaPart = substr($this->part, 0, $index);
			$this->part = substr($this->part, $index);
			return $alphaPart;
		}
	}
	
	
	public function nextToken() {
		return $this->nextElement();
	}
	
	
	/**
	 * Returns what remains of the original string, without tokenization.  This
	 * method is useful for getting the <string-d (everything else)>;
	 * section of a version string.
	 * 
	 * @return remaining version string
	 */
	public function getRemainder() {
		return $this->part;
	}
}
?>