<?
/* This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at http://mozilla.org/MPL/2.0/. */


//
// Unit tests
//
// (compare results to version order in specifications below)
//
/*
$all = array('1.0pre1', '1.0pre2', '1.0', '1.0.0', '1.0.0.0', '1.1pre', '1.1pre0', '1.0+',
	'1.1pre1a', '1.1pre1', '1.1pre10a', '1.1pre10');

for ($i=0; $i<sizeOf($all); $i++) {
	for ($j=0; $j<sizeOf($all); $j++) {
		$a = $all[$i];
		$b = $all[$j];
		$compare = ToolkitVersionComparator::compare($a, $b);
		if ($compare<0) {
			echo $a . ' is less than ' . $b;
		}
		if ($compare==0) {
			echo $a . ' equals ' . $b;
		}
		if ($compare>0) {
			echo $a . ' is greater than ' . $b;
		}
		echo "\n";
	}
	echo "\n\n";
}
*/


/**
 * Implements Mozilla Toolkit's nsIVersionComparator
 *
 * Version strings are dot-separated sequences of version-parts.
 *
 * A version-part consists of up to four parts, all of which are optional:
 * <number-a><string-b><number-c><string-d (everything else)>
 * A version-part may also consist of a single asterisk "*" which indicates
 * "infinity".
 *
 * Numbers are base-10, and are zero if left out.
 * Strings are compared bytewise.
 *
 * For additional backwards compatibility, if "string-b" is "+" then
 * "number-a" is incremented by 1 and "string-b" becomes "pre".
 *
 * 1.0pre1
 * < 1.0pre2  
 *   < 1.0 == 1.0.0 == 1.0.0.0
 *     < 1.1pre == 1.1pre0 == 1.0+
 *       < 1.1pre1a
 *         < 1.1pre1
 *           < 1.1pre10a
 *             < 1.1pre10
 *
 * Although not required by this interface, it is recommended that
 * numbers remain within the limits of a signed char, i.e. -127 to 128.
 */
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
