<?php

/**
 * @name           unique-id
 * @namespace      sak32009
 * @description    Creates unique static ID
 * @author         Sak32009 <https://github.com/Sak32009>
 * @copyright      2016, Sak32009
 * @version        2.1.0
 * @license        MIT
 * @require        PHP >= 5.5
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

        return password_hash($userData, PASSWORD_DEFAULT);

    }

    /**
     * Verify hash
     * @param string $hash Hash
     * @return boolean
     */
    public function verify($hash){

        $userData = $this->getUserData();

        return password_verify($userData, $hash);

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
