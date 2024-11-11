<?php

class ItemController extends Controller
{
    /* Public */
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    public function index($inspeccion_id)
    {
        $this->View->render('item/public/index', array(
            'items' => ItemModel::getAllItems(),
            'inspeccion_id' => $inspeccion_id, 
            'title' => 'Items'
        ));
    }

    public function create()
    {
        ItemModel::createItem(Request::post('item_text'));
        Redirect::to('item');
    }

    public function edit($item_id)
    {
        $this->View->render('item/public/edit', array(
            'item' => ItemModel::getItem($item_id),
            'title' => 'Modificar item'
        ));
    }

    public function editSave()
    {
        ItemModel::updateItem(Request::post('item_id'), Request::post('item_text'));
        Redirect::to('item');
    }

    public function delete($item_id)
    {
        ItemModel::deleteItem($item_id);
        Redirect::to('item');
    }

    /* Admin */
    public function admin()
    {
        Auth::checkAdminAuthentication();
        $this->View->render('item/private/index', array(
            'items' => ItemModel::getAllItemsAdmin(),
            'users' => UserModel::getAllUsers(),
            'title' => 'Admin Items'
        ));
    }

    public function createAdmin()
    {
        Auth::checkAdminAuthentication();
        ItemModel::createItemAdmin(Request::post('user_id'), Request::post('item_text'));
        Redirect::to('item/admin');
    }

    public function editAdmin($item_id)
    {
        Auth::checkAdminAuthentication();
        $this->View->render('item/private/edit', array(
            'item' => ItemModel::getItemAdmin($item_id),
            'title' => 'Modificar item'
        ));
    }

    public function editSaveAdmin()
    {
        Auth::checkAdminAuthentication();
        ItemModel::updateItemAdmin(Request::post('item_id'), Request::post('item_text'));
        Redirect::to('item/admin');
    }

    public function deleteAdmin($item_id, $user_id)
    {
        Auth::checkAdminAuthentication();
        ItemModel::deleteItemAdmin($item_id, $user_id);
        Redirect::to('item/admin');
    }
}