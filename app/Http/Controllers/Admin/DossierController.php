<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dossier;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DossierController extends Controller {
    protected $dossier;

    public function __construct() {
        $this->dossier = new Dossier();
    }

    public function index() {
        $data['dossiers'] = $this->dossier->get_all();
        return view('admin.dossier.index', $data);
    }

    public function details($id) {
        $dossier = $this->dossier->get_by_id($id);
        if ($dossier) {
            $data['dossier'] = $dossier;
            return view('admin.dossier.details', $data);
        } else {
            return redirect(route('error_page'));
        }
    }

    public function before_entry() {
        return view('admin.dossier.entry');
    }

    public function entry(Request $data_post) {
        $result_entry = $this->dossier->entry($data_post);
        if ($result_entry['status']) {
            return redirect(route('dossier_details',['id' => $result_entry['id_insert']]));
        } else {
            Session::flash('msg', '<div class="alert alert-warning">Entry new Dossier fail</div>');
            return redirect(route('dossier_entry'))->withErrors($result_entry['msg'])->withInput();
        }
    }

    public function before_edit($id) {
        $dossier = $this->dossier->get_by_id($id);
        if ($dossier) {
            $data['dossier'] = $dossier;
            return view('admin.dossier.edit', $data);
        } else {
            return redirect(route('error_page'));
        }
    }

    public function edit(Request $data_post, $id) {
        $result_edit = $this->dossier->edit($data_post, $id);
        if ($result_edit['status']) {
            return redirect(route('dossier_details', ['id' => $id]));
        } else {
            return redirect(route('dossier_edit', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
        }
    }

    public function delete($id) {
        $result_delete = $this->dossier->remove($id);
        if (!$result_delete['status']) {
            return redirect(route('error_page'));
        } else {
            return redirect(route('dossier_list'));
        }
    }


}
