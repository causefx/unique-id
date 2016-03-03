<?php

/**
 * @name           unique-id
 * @namespace      sak32009
 * @description    Creates unique static ID
 * @author         Sak32009 <https://github.com/Sak32009>
 * @copyright      2016, Sak32009
 * @version        1.1.0
 * @license        MIT
 * @require        PHP >= 5.4
 * @homepage       https://github.com/Sak32009/unique-id
 */

namespace sak32009;

class uniqueID{

    /**
     * Options
     * @type array
     */
    protected $options = [

        /**
         * Hash salt
         * See https://en.wikipedia.org/wiki/Salt_%28cryptography%29
         * In short, is the private key.
         * @type string
         * @default null
         */
        'hash_salt' => null,

        /**
         * Hash algorithm
         * See https://secure.php.net/manual/en/function.hash-algos.php
         * @type string
         * @default sha256
         */
        'hash_algo' => 'sha256'

    ];

    /**
     * Contains data
     * @type array
     * @default []
     */
    protected $moreData = [];

    /**
     * Get user data
     * @return string
     */
    protected function getUserData(){

        $data = [
            $this->options['hash_salt'],
            $_SERVER['HTTP_USER_AGENT'],
            $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            $_SERVER['REMOTE_ADDR'],
            $_SERVER['SERVER_NAME'],
            $_SERVER['SERVER_ADDR'],
            $_SERVER['SERVER_PORT'],
            $_SERVER['REQUEST_SCHEME']
        ];

        if(count($this->moreData) > 0){

            $data = array_merge($data, $this->moreData);

        }

        return json_encode($data);

    }

    /**
     * Generate ID
     * @return string
     */
    public function generateID(){

        $userData = $this->getUserData();

        return hash($this->options['hash_algo'], $userData);

    }

    /**
     * Compare your ID with another ID
     * return true if they are equal
     * @param string $anotherID Another ID
     * @return boolean
     */
    public function compare($anotherID){

        $currentID = $this->generateID();

        return $currentID === $anotherID;

    }

    /**
     * Set option
     * @param string $key Key
     * @param string $val Value
     * @return boolean
     */
    public function setOption($key, $val){

        if(array_key_exists($key, $this->options)){

            $this->options[ $key ] = $val;

            return true;

        }

        return false;

    }

    /**
     * Add more data for secure ID
     * @param string $str Data
     * @return boolean
     */
    public function addData($str){

        if(strlen($str) > 0){

            $this->moreData[] = $str;

            return true;

        }

        return false;

    }

}
