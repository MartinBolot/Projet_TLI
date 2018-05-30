<?php
require_once('./src/model/Database.php');


class RestController
{
	private $_db;

	public function __construct(){
		$this->_db = new Database();
	}

	// api
	public function getApi() {
		?>
		<pre style="word-wrap: break-word; white-space: pre-wrap;">
			{
				"detailsPathologie" : "api/details/{id}",
				"getPatho" : api/pathologie/{id}
			}
		</pre>
		<?php
	}

	// api/details/{id}
	public function detailsPathologie($idPatho) {
		$details = $this->_db->getDetails($idPatho);
		echo json_encode($details);
	}

	// api/pathologie/{id}
	public function getPatho($idPatho) {
		$patho = $this->_db->getPatho($idPatho);
		echo json_encode($patho);
	}

	public function pageNotFound() {
		echo json_encode("");
	}
}
?>
