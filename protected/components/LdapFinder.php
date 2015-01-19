<?php


class LdapFinder extends CComponent{
	
 private $_ldapCnx;
 // private $_resultFields=array("dn","cn","ou","mail","sn","fullname","givenname","uidnumber","gidnumber","uid","telephoneNumber","messageserver","homedirectory","loginshell");
 private $_resultFields=array("cn","sn","givenname");
 private $_host = "ldaps://ldap.cubric.cf.ac.uk";
 private $_baseDn ="";
 private $filter="((uid=%s))";
 // private $_baseDn ="o=cf";
/* #################################################################### */
public function __construct(){
	 
	if ( ($this->_ldapCnx=ldap_connect($this->_host) ) === FALSE )
		throw new CException(sprintf('Cannot connect to ldap host: %s' , $this->_host));
}
/* #################################################################### */
public function getResultData()
{
	return $this->_resultData; 
}
/* #################################################################### */
public function bind($dn,$pass){
	
	return @ldap_bind($this->_ldapCnx,$dn,$pass);
}
/* #################################################################### */
public function getLdapDn($user){
	
	$s =  sprintf("uid=%s", $user); 
	$search = $this->search($s);
	if ($search->count > 0)
		return $search->data[0]["dn"]; 
		
	return false; 
} 

/* #################################################################### */
public function search($statement){  //returns false if there is a problem
	
	$results = new CAttributeCollection; 
	$_search = ldap_search($this->_ldapCnx,$this->_baseDn,$statement,$this->_resultFields);
	$results->data = ldap_get_entries($this->_ldapCnx,$_search); 
	$results->count =ldap_count_entries($this->_ldapCnx, $_search); 
	return $results;
	
} 
/* #################################################################### */
} // end class 


