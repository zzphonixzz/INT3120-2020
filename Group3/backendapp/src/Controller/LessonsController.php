<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Lessons Controller
 *
 * @property \App\Model\Table\LessonsTable $Lessons
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 * @property \App\Model\Table\GrammarsTable $Grammars
 *
 * @method \App\Model\Entity\Lesson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LessonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 10
        ];
        $lessons = $this->paginate($this->Lessons);

        $this->set(compact('lessons'));
    }

    /**
     * View method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lesson = $this->Lessons->get($id, [
            'contain' => ['Grammars'],
        ]);

        $this->set('lesson', $lesson);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lesson = $this->Lessons->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($data['thumbnail']['error'] == 0) {
                $thumbnail = $this->Upload->uploadSingle($data['thumbnail']);
                $data['thumbnail'] = $thumbnail;
            }
            if (isset($data['grammars'])) {
                foreach ($data['grammars'] as $k => $grammar) {
                    if ($grammar['thumbnail']['error'] == 0) {
                        $grammarThumbnail = $this->Upload->uploadSingle($grammar['thumbnail']);
                        $data['grammars'][$k]['thumbnail'] = $grammarThumbnail;
                    }
                }
            }
            $lesson = $this->Lessons->patchEntity($lesson, $data);
//            dd($lesson);
            if ($this->Lessons->save($lesson)) {
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $this->set(compact('lesson'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lesson = $this->Lessons->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            if ($this->Lessons->save($lesson)) {
                $this->Flash->success(__('The lesson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lesson could not be saved. Please, try again.'));
        }
        $this->set(compact('lesson'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lesson = $this->Lessons->get($id);
        if ($this->Lessons->delete($lesson)) {
            $this->Flash->success(__('The lesson has been deleted.'));
        } else {
            $this->Flash->error(__('The lesson could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addGrammar()
    {

    }

    public function listLesson()
    {
        $this->RequestHandler->renderAs($this, 'json');
        $this->loadModel('Bookmarks');
        $this->loadModel('Grammars');
        if($this->request->getQuery()){
            $clientId = $this->request->getQuery('client_id');
        } else {
            $clientId = '';
        }
        $listBookmarks = $this->Grammars->find()->contain(['Bookmarks' => function ($q) use ($clientId){
            return $q->where(['client_id' => $clientId, 'item_type' => GRAMMAR_TYPE, 'bookmark_type' => LIKE_BOOKMARK]);
        }])->toArray();
        $listReminders = $this->Grammars->find()->contain(['Bookmarks' => function ($q) use ($clientId){
            return $q->where(['client_id' => $clientId, 'item_type' => GRAMMAR_TYPE, 'bookmark_type' => TIMER_BOOKMARK]);
        }])->toArray();
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $lessons = $this->Lessons->find()->contain(['Grammars'])->toArray();
        $baseUrl = Router::url('/', true);
        foreach ($lessons as $key => $lesson) {
            $lesson->thumbnail = $baseUrl . $lesson->thumbnail;
            $lesson->numb_words = count($lesson->grammars);
        }
        $listBookmarks = $this->Bookmarks->find()->contain(['Grammars'])
            ->where(['client_id' => $clientId, 'item_type' => GRAMMAR_TYPE, 'bookmark_type' => LIKE_BOOKMARK])->toArray();
        $listReminders = $this->Bookmarks->find()->contain(['Grammars'])
            ->where(['client_id' => $clientId, 'item_type' => GRAMMAR_TYPE, 'bookmark_type' => TIMER_BOOKMARK])->toArray();
        $bookmarks = $reminds = [];
        foreach($listBookmarks as $k => $listBookmark){
            $listBookmark->grammar->thumbnail = $baseUrl . $listBookmark->grammar->thumbnail;
            $bookmarks[] =  $listBookmark->grammar;
        }
        foreach($listReminders as $k => $listReminder){
            $listReminder->grammar->thumbnail = $baseUrl . $listReminder->grammar->thumbnail;
            $reminds[] =  $listReminder->grammar;
        }
        $res['status'] = STT_SUCCESS;
        $res['data']['list_lessons'] = $lessons;
        $res['data']['list_bookmarks'] = $bookmarks;
        $res['data']['list_reminds'] = $reminds;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewLesson($id)
    {
        $this->RequestHandler->renderAs($this, 'json');
        if ($this->request->getQuery()) {
            $clientId = $this->request->getQuery('client_id');
        } else {
            $clientId = '';
        }
        $res = ['status' => STT_ERROR, 'message' => '', 'data' => []];
        $lesson = $this->Lessons->get($id, ['contain' => ['Grammars', 'Grammars.Bookmarks' => function ($q) use ($clientId) {
            return $q->where(['client_id' => $clientId]);
        }]]);
        $baseUrl = Router::url('/', true);
        $lesson->thumbnail = $baseUrl . $lesson->thumbnail;
        foreach ($lesson->grammars as $key => $grammar) {
            $lesson->grammars[$key]->thumbnail = $baseUrl . $grammar->thumbnail;
        }
        $res['status'] = STT_SUCCESS;
        $res['data'] = $lesson;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }
}
