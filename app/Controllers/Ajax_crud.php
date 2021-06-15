<?php

//Ajax_crud.php

namespace App\Controllers;

use App\Models\UserModel;
use monken\TablesIgniter;

class Ajax_crud extends BaseController {

    function index() {
        return view('ajax_crud');
    }

    function fetch_all() {
        $userModel = new UserModel();

        $data_table = new TablesIgniter();
        $data_table->setTable($userModel->noticeTable())
                ->setDefaultOrder("id", "DESC")
                ->setSearch(["first_name","last_name", "email"])
                ->setOrder(["id", "first_name", "last_name", "email", "gender"])
                ->setOutput(["id", "first_name", "last_name", "birth_date", "email", "gender", $userModel->button()]);
        return $data_table->getDatatable();
    }

    function delete() {
        if ($this->request->getVar('id')) {
            $id = $this->request->getVar('id');

            $crudModel = new UserModel();

            $crudModel->where('id', $id)->delete($id);

            echo '<div class="alert alert-success">User Data Deleted</div>';
        }
    }

}

?>