<?php
/**
 * memcache.php
 * 
 * @package	memcache
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */
class memcache
{
    private static $instance = array();
    
    private static $cache = null;
    
    private $bae_appid;
    
    private $err_msg;
    
    private function __construct($bae_appid)
    {
        $this->cache = new BaeMemcache();
        $this->cache->set_shareAppid($bae_appid);
        $this->bae_appid = $bae_appid;
        $this->err_msg = '';
    }
    
    public static function getInstance($bae_appid)
    {
    	if(empty(self::$instance[$bae_appid])){
    		self::$instance[$bae_appid] = new self($bae_appid);
    	}
    	return self::$instance[$bae_appid];
    } 
    
    public function error()
    {
    	return $this->err_msg;
    }
    
	/**
	 * Add an item to the server of current machineroom
	 * 
	 * @param string $key	The key that will be associated with the item
	 * @param mix $var		The variable to store
	 * @param int $flag		Use MEMCACHE_COMPRESSED to store the item compressed (uses zlib)
	 * @param int $expire	Expiration time of the item. If it's equal to zero, the item will never expire
	 * @return bool
	 * @see	http://cn.php.net/manual/en/function.memcache-add.php
	 */
	public function add($key, $var, $flag = 0, $expire = 0)
	{
		$res = $this->cache->add($key, $var, $flag, $expire);
		if (!$res) {
			$this->err_msg = "add key[$key] to memcached failed or key has already exists";
		}
		return $res;
	}
	
	/**
	 * Retrieve item from the server of current machineroom
	 * 
	 * @param string|array $mixedKey	The key or array of keys to fetch
	 * @param int|array $mixedFlags		If present, flags fetched along with 
	 * 									the values will be written to this parameter
	 * @return string|array
	 * @see http://cn.php.net/manual/en/function.memcache-get.php
	 */
	public function get($mixedKey, & $mixedFlags = false)
	{
		$res = $this->cache->get($mixedKey, $mixedFlags);
		if ($res === false) {
			if (is_string($mixedKey)) {
				$this->errmsg = "get key[$mixedKey] from memcached failed or key not exists";
			} else {
				$this->errmsg = "get multiple keys from memcached failed or no keys exists";
			}
		}
		return $res;
	}
	
	/**
	 * Store data at the server of current machineroom
	 * 
	 * @param string $key	The key that will be associated with the item
	 * @param mixed $var	The variable to store
	 * @param int $flag		Use MEMCACHE_COMPRESSED to store the item compressed (uses zlib)
	 * @param int $expire	Expiration time of the item. If it's equal to zero, the item will never expire
	 * @return bool
	 * @see http://cn.php.net/manual/en/function.memcache-set.php
	 */
	public function set($key, $var, $flag = 0, $expire = 1800)
	{
		$res = $this->cache->set($key, $var, $flag, $expire);
		if (!$res) {
			$this->errmsg = "set key[$key] to memcached failed";
		}
		return $res;
	}
	
	/**
	 * Increment cache item's value at the server of current machineroom
	 * 
	 * @param string $key	Key of the item to increment
	 * @param int $value	Increment the item by value
	 * @return int
	 * @see http://cn.php.net/manual/en/function.memcache-increment.php
	 */
	public function increment($key, $value = 1)
	{
		$res = $this->cache->increment($key, $value);
		if (!$res) {
			$this->errmsg = "increment key[$key] with value[$value] at memcached failed";
		}
		return $res;
	}
	
	/**
	 * Decrement cache item's value at the server of current machineroom
	 * 
	 * @param string $key	Key of the item to increment
	 * @param int $value	Increment the item by value
	 * @return int
	 * @see http://cn.php.net/manual/en/function.memcache-decrement.php
	 */
	public function decrement($key, $value = 1)
	{
		$res = $this->cache->decrement($key, $value);
		if (!$res) {
			$this->errmsg = "decrement key[$key] with value[$value] at memcached failed";
		}
		return $res;
	}
	
	/**
	 * Replace value of the <b>existing</b> item in current machineroom
	 * 
	 * @param string $key	The key that will be associated with the item
	 * @param mixed $var	The variable to store
	 * @param int $flag		Use MEMCACHE_COMPRESSED to store the item compressed (uses zlib)
	 * @param int $expire	Expiration time of the item. If it's equal to zero, the item will never expire
	 * @return bool
	 * @see http://cn.php.net/manual/en/function.memcache-replace.php
	 */
	public function replace($key, $var, $flag = 0, $expire = 0)
	{
		$res = $this->cache->replace($key, $var, $flag, $expire);
		if (!$res) {
			$this->errmsg = "replace key[$key] in memcached failed";
		}
		return $res;
	}
	
	/**
	 * Flush all existing items at the server of current machineroom
	 * 
	 * @see http://cn.php.net/manual/en/function.memcache-flush.php
	 */
	public function flush()
	{
		$res = $this->cache->flush();
		if (!$res) {
			$this->errmsg = "flush memcached failed";
		}
		return $res;
	}
	
	/**
	 * Delete item from the server of current machineroom
	 * 
	 * @param string $key	The key associated with the item to delete
	 * @param int $timeout	Execution time of the item. If it's equal to zero, 
	 * 						the item will be deleted right away whereas if you 
	 * 						set it to 30, the item will be deleted in 30 seconds
	 * @return bool
	 * @see http://cn.php.net/manual/en/function.memcache-delete.php
	 */
	public function delete($key, $timeout = 0)
	{
		$res = $this->cache->delete($key, $timeout);
		if (!$res) {
			$this->errmsg = "delete key[$key] from memcached failed";
		}
		return $res;
	}
}