<?php

class Session
{

    static $instance;

    /**
     * @return Session
     */
    static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @param $key
     * @param $message
     */
    public function setFlash($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    /**
     * @return bool
     */
    public function hasFlashes()
    {
        return isset($_SESSION['flash']);
    }

    /**
     * @return mixed
     */
    public function getFlashes()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    /**
     * @param $key
     * @param $value
     */
    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     * @return null
     */
    public function read($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * @param $key
     */
    public function delete($key)
    {
        if (isset($_SESSION['flash']) AND !empty($_SESSION['flash'])) {
            unset($_SESSION[$key]);
        }
    }

    public function deleteFlash()
    {
        if (isset($_SESSION['flash']) AND !empty($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    }

    public function htmlFlash()
    {
        if (isset($_SESSION['flash']) AND !empty($_SESSION['flash'])) {

            foreach ($_SESSION['flash'] as $k => $val):
                echo '<div class="alert"><p class="'. $k .'-title"></p>';
                echo '<p>' . $val . '</p>';
                echo '</div>';
            endforeach;

        }
    }

    public function setSession($value ,$name, $other = null)
    {
        if(isset($other) AND !empty($other)){
            $_SESSION[$name][$other] = $value;
        } else {
            $_SESSION[$name] = $value;
        }
    }

    public function sessionValue($name)
    {
        if(isset($_SESSION[$name])){
            echo $_SESSION[$name];
        } else {
            echo "<pre><code class='error'>";
            print_r('$_SESSION does not exist. Try to set a session var and debug again.');
            echo "</pre></code>";
        }
    }


}
