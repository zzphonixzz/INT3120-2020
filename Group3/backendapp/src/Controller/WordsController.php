<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Words Controller
 *
 * @property \App\Model\Table\WordsTable $Words
 *
 * @method \App\Model\Entity\Word[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $words = $this->paginate($this->Words);

        $this->set(compact('words'));
    }

    /**
     * View method
     *
     * @param string|null $id Word id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $word = $this->Words->get($id, [
            'contain' => [],
        ]);

        $this->set('word', $word);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $word = $this->Words->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['start_character'] = $data['word'][0];
            if(isset($data['synonymous'])){
                $data['synonymous'] = json_encode($data['synonymous'], JSON_UNESCAPED_UNICODE);
            }
            if(isset($data['antonymous'])){
                $data['antonymous'] = json_encode($data['antonymous'], JSON_UNESCAPED_UNICODE);
            }
            $word = $this->Words->patchEntity($word, $data);
            if ($this->Words->save($word)) {
                $this->Flash->success(__('The word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The word could not be saved. Please, try again.'));
        }
        $this->set(compact('word'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $word = $this->Words->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $word = $this->Words->patchEntity($word, $this->request->getData());
            if ($this->Words->save($word)) {
                $this->Flash->success(__('The word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The word could not be saved. Please, try again.'));
        }
        $this->set(compact('word'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $word = $this->Words->get($id);
        if ($this->Words->delete($word)) {
            $this->Flash->success(__('The word has been deleted.'));
        } else {
            $this->Flash->error(__('The word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addSynonymousWord()
    {
    }

    public function addAntonymousWord()
    {
    }
    public function search(){
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $keyword = $this->request->getQuery("keyword");
        $suggestSearch = [];
        $listWords = $this->Words->find()->select(['id', 'word'])->where(['start_character'=> $keyword[0], 'word LIKE' =>  $keyword . '%'])->toArray();
        if($listWords){
            foreach($listWords as $k => $listWord){
                $suggestSearch[$k]['id'] = $listWord->id;
                $suggestSearch[$k]['word'] = $listWord->word;
            }
        }
        $res['status'] = STT_SUCCESS;
        $res['data'] = $suggestSearch;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewWord($id){
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $word = $this->Words->get($id);
        $res['status'] = STT_SUCCESS;
        $res['data'] = $word;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }
    public function viewAllWord(){
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $words = $this->Words->find()->toArray();
        $res['status'] = STT_SUCCESS;
        $res['data'] = $words;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }
}
