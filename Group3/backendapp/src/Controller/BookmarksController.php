<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 *
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

//    public function beforeFilter(Event $event) {
//        if (in_array($this->request->action, ['bookmark'])) {
//            $this->eventManager()->off($this->Csrf);
//        }
//    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Items'],
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Clients', 'Items'],
        ]);

        $this->set('bookmark', $bookmark);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }
        $clients = $this->Bookmarks->Clients->find('list', ['limit' => 200]);
        $items = $this->Bookmarks->Items->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'clients', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
        }
        $clients = $this->Bookmarks->Clients->find('list', ['limit' => 200]);
        $items = $this->Bookmarks->Items->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'clients', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function bookmark()
    {
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $data = $this->request->getData();
        $condition = [
            'client_id' => $data['client_id'],
            'item_id' => $data['item_id'],
            'item_type' => $data['item_type'],
            'bookmark_type' => $data['bookmark_type'],
        ];
        $bookmark = $this->Bookmarks->find()->where($condition)->first();
        if($bookmark){
            $res['status'] = STT_ERROR;
            $res['message'] = "Bạn đã đánh dấu từ này";
        } else {
            $bookmark = $this->Bookmarks->newEntity();
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $data);
            if($this->Bookmarks->save($bookmark)){
                $res['status'] = STT_SUCCESS;
                $res['message'] = "Đánh dấu thành công";
            }
        }
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }
    public function deleteBookmark()
    {
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $data = $this->request->getData();
        $condition = [
            'client_id' => $data['client_id'],
            'item_id' => $data['item_id'],
            'item_type' => $data['item_type'],
            'bookmark_type' => $data['bookmark_type'],
        ];
        $bookmark = $this->Bookmarks->find()->where($condition)->first();
        if($bookmark){
            $this->Bookmarks->delete($bookmark);
            $res['status'] = STT_SUCCESS;
            $res['message'] = "Bỏ đánh dấu thành công";
        } else {
            $res['status'] = STT_NOT_FOUND;
            $res['message'] = "Không tìm thấy từ đánh dấu";
        }
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }
}
