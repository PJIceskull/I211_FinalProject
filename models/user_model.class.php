<?php
/**
 * Author: Abdul Sankoh
 * Date: 4/25/2023
 * File user_model.class.php
 * Description:
 */

class UserModel {

    //private data members
    private $db;
    private $dbConnection;
    private $tblUser;


    //initializes a database connection using the Database class.
    public function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUser = $this->db->getUserTable();
    }

    //add a user into the "users" table in the database

    //verify username and password against a database record
    public function verify_user()
    {
        try {
            //retrieve username and password
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($username) || empty($password)){
                throw new DataMissingException("Missing Input Value");
            }


            //sql statement to filter the users table data with a username
            $sql = "SELECT password FROM " . $this->db->getUserTable() . " WHERE username='$username'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            // if the query fails then throw DataBaseExecutionException class
            if(!$query){
                throw new DatabaseExecutionException();
            }

            //verify password; if password is valid, set a temporary cookie
            if ($query and $query->num_rows > 0) {
                $result_row = $query->fetch_assoc();
                $hash = $result_row['password'];
                if (password_verify($password, $hash)) {
                    setcookie("user", $username);
                     return "Successful";
                } else {
                    return false;
                }
            }
            // A catch statement that displays an error message
            // to the user using the UserError class
            // then stops the execution of the script after displaying
            // the error message.
        } catch (DataMissingException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (DatabaseExecutionException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (Expection $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        }

    }

    public function add_user() {
        try {
            //retrieve user inputs from the registration form
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $lastname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
            $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty($username) || empty($firstname) || empty($lastname)){
                throw new DataMissingException("Missing Input Value");
            }

            if (str_contains($email, '@') === false) {
                throw new EmailFormatException("Email Placed is Invalid");
            }

            if (strlen($password) < 5) {
                throw new DataLengthException("Password needs to be 5 characters or more");
            }

            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //construct an INSERT query
            $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES(NULL, '$username', '$hashed_password', '$email', '$firstname', '$lastname')";

            //execute the query and return true if successful or false if failed
            if ($this->dbConnection->query($sql) === TRUE) {
                return "Successful";
            } else {
                throw new DatabaseExecutionException("Database Error!");
            }
            // A catch statement that displays an error message
            // to the user using the UserError class
            // then stops the execution of the script after displaying
            // the error message.
        } catch (DataMissingException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (DatabaseExecutionException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (EmailFormatException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (DataLengthException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (Exception $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        }
    }

    //logout user: destroy session data
    public function logout() {
        //destroy session data
        setcookie("user", '', -10);
        return true;
    }

    //reset password
    public function reset_password()
    {
        try {

            //retrieve username and password from a form
            $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
            $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            // if the username and password fields are empty, then throw the
            // DataMissingException.
            if (empty($username) || empty($password)) {
                throw new DataMissingException("Missing Input Value");
            }

            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // if password is less than 5 characters then throw the DataLengthException.
            if (strlen($password) < 5) {
                throw new DataLengthException("Password needs to be 5 characters or more");
            }

            //the sql statement for update
            $sql = "UPDATE  " . $this->db->getUserTable() . " SET password='$hashed_password' WHERE username='$username'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            //return false if no rows were affected
            if (!$query || $this->dbConnection->affected_rows == 0) {

                throw new DatabaseExecutionException("Database Failed");
            } else{
                return "Successful";
            }

            // A catch statement that displays an error message
            // to the user using the UserError class
            // then stops the execution of the script after displaying
            // the error message.
        } catch (DataMissingException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (DataLengthException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (DatabaseExecutionException $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        } catch (Exception $e){
            $view = new UserError();
            $view->display($e->getMessage());
            exit();
        }
    }


}