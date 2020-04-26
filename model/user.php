<?php
class User
{
	private $pdo;
    public $name;
    public $lastname;
    public $status;
    public $email;

	public function __construct()
	{
		try {
			$this->pdo = Connection::connect();
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Requirement1 - As User I want to see the list of users.
	 *
	 * @return array
     */
	public function getUserList()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM users");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);

		} catch(Exception $e) {
			$logGetUserList = $this->pdo->prepare(
				"INSERT INTO log_exceptions(exception, date_exception)
							  VALUES(:exception, :date)"
			);
			$logGetUserList->bindParam(':exception', $e->getMessage(), PDO::PARAM_STR, 250);
			$logGetUserList->bindParam(":date", now());

			$logGetUserList->execute();
		}
	}

	/**
	 * Requirement2 - Get User by id to update or other actions.
	 *
	 * @param $id
	 *
	 * @return mixed
     */
	public function getUsersById($id)
	{
		try {
			$userData = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
			$userData->bindParam(":id", $id);

			$userData->execute();

			return $userData->fetchObject("stdClass");

		} catch(Exception $e) {
			$logGetUsersById = $this->pdo->prepare(
				"INSERT INTO log_exceptions(exception, date_exception)
							  VALUES(:exception, :date)"
			);
			$logGetUsersById->bindParam(':exception', $e->getMessage(), PDO::PARAM_STR, 250);
			$logGetUsersById->bindParam(":date", now());

			$logGetUsersById->execute();
		}
	}

	/**
	 * Requirement3 -  As user I want to add a new user.
	 *
	 * @param User $data
     */
	public function add(user $data)
	{
		try {
			$insertUser = $this->pdo->prepare(
				'INSERT INTO users(name, lastname, status, email)
							  VALUES(:name, :lastname, :status, :email)'
			);
			$insertUser->bindParam(':name', $data->name, PDO::PARAM_STR, 20);
			$insertUser->bindParam(':lastname', $data->lastname, PDO::PARAM_STR, 40);
			$insertUser->bindParam(':status', $data->status, PDO::PARAM_INT, 1);
			$insertUser->bindParam(':email', $data->email, PDO::PARAM_STR, 20);

			$insertUser->execute();

		} catch (Exception $e) {
			$logInsertUser = $this->pdo->prepare(
				"INSERT INTO log_exceptions(exception, date_exception)
							  VALUES(:exception, :date)"
			);
			$logInsertUser->bindParam(':exception', $e->getMessage(), PDO::PARAM_STR, 250);
			$logInsertUser->bindParam(":date", now());

			$logInsertUser->execute();
		}
	}

	/**
	 * Requirement4 - As user I want to delete a user.
	 *
	 * @param $id
     */
	public function delete($id)
	{
		try
		{
			// Assumption: Deleted permanently.
			// If you want a logical delete --> we must update users.status from 1 to 0
			$deleteUser = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
			$deleteUser->bindParam(":id", $id);

			$deleteUser->execute();

		} catch (Exception $e) {
			$logDeleteUser = $this->pdo->prepare(
				"INSERT INTO log_exceptions(exception, date_exception)
							  VALUES(:exception, :date)"
			);
			$logDeleteUser->bindParam(':exception', $e->getMessage(), PDO::PARAM_STR, 250);
			$logDeleteUser->bindParam(":date", now());

			$logDeleteUser->execute();
		}
	}

	/**
	 * Requirement5 - As user I want to edit a user.
	 *
	 * @param $data
     */
	public function update($data)
	{
		try
		{
			// Assumption: Edit all fields.
			// Improvement: Review data to modify and only update those.
			$updateUser = $this->pdo->prepare('UPDATE users SET name = :name,
												lastname = :lastname,
												status = :status,
												email = :email
											   WHERE id = :id');
			$updateUser->bindParam(':name', $data->name, PDO::PARAM_STR, 20);
			$updateUser->bindParam(':lastname', $data->lastname, PDO::PARAM_STR, 40);
			$updateUser->bindParam(':status', $data->status, PDO::PARAM_INT, 1);
			$updateUser->bindParam(':email', $data->email, PDO::PARAM_STR, 20);
			$updateUser->bindParam(':id', $data->id, PDO::PARAM_INT, 11);

			$updateUser->execute();

		} catch (Exception $e) {
			$logUpdateUser = $this->pdo->prepare(
				"INSERT INTO log_exceptions(exception, date_exception)
							  VALUES(:exception, :date)"
			);
			$logUpdateUser->bindParam(':exception', $e->getMessage(), PDO::PARAM_STR, 250);
			$logUpdateUser->bindParam(":date", now());

			$logUpdateUser->execute();
		}
	}
}
