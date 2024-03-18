<?php
/**
 * E commerce website
 * 
 * @since 1.0.0
 * @package E-commerce website
 */

 namespace Database;
 
 if( ! class_exists( 'DatabaseInfo' ) ) :
    /**
     * All database interactions
     * 
     * @since 1.0.0
     */
    class DatabaseInfo {
        /**
         * Database server name
         * 
         * @since 1.0.0
         */
        public $servername;

        /**
         * Database username
         * 
         * @since 1.0.0
         */
        public $username;

        /**
         * Database password
         * 
         * @since 1.0.0
         */
        public $password;

        /**
         * Database name
         * 
         * @since 1.0.0
         */
        public $database;

        /**
         * Connection Variable
         * 
         * @since 1.0.0
         */
        public $connection;

        /**
         * All posts
         * 
         * @since 1.0.0
         */
        public $all_posts;

        /**
         * Function that gets instantiated when class is called
         * 
         * @since 1.0.0
         */
        function __construct() {
            $this->servername = 'localhost';
            $this->username = 'root';
            $this->password = '';
            $this->database = 'e_commerce_website';
            $this->connection = $this->database_connect();
            $this->all_posts = $this->get_products();
        }

        /**
         * Connect to database
         * 
         * @since 1.0.0
         */
        public function database_connect() {
            $conn = mysqli_connect( $this->servername, $this->username, $this->password, $this->database );
            return $conn;
            if( ! $conn ) die( 'Failed to connect to database' );
        }

        /**
         * Select from database
         * 
         * @since 1.0.0
         */
        public function get_products() {
            $table = 'posts';
            $select_query = "SELECT * FROM $table";
            $query_result = mysqli_query( $this->connection, $select_query );
            $all_posts = [];
            if( $query_result->num_rows > 0 ) :
                while( $row = $query_result->fetch_assoc() ) :
                    $all_posts[] = $row;
                endwhile;
                return $all_posts;
            endif;
        }
    }
    $database = new DatabaseInfo();
 endif;