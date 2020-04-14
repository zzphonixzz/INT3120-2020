<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 * @property \App\Model\Table\ExercisesTable $Exercises
 * @property \App\Model\Table\DoneAnswersTable $DoneAnswers
 * @property \App\Model\Table\AnswersTable $Answers
 * @property \App\Model\Table\ClientRecordsTable $ClientRecords
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 *
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tests = $this->paginate($this->Tests);

        $this->set(compact('tests'));
    }

    /**
     * View method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => ['Exercises'],
        ]);

        $this->set('test', $test);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $test = $this->Tests->newEntity();
        if ($this->request->is('post')) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test could not be saved. Please, try again.'));
        }
        $this->set(compact('test'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The test has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test could not be saved. Please, try again.'));
        }
        $this->set(compact('test'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $test = $this->Tests->get($id);
        if ($this->Tests->delete($test)) {
            $this->Flash->success(__('The test has been deleted.'));
        } else {
            $this->Flash->error(__('The test could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function listTest()
    {
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $listTests = $this->Tests->find()->toArray();
        $res['data'] = $listTests;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewTest($id)
    {
        $this->loadModel('Exercises');
        $this->loadModel('ClientRecords');
        $clientId = $this->request->getQuery('client_id');
        $this->RequestHandler->renderAs($this, 'json');
        $test = $this->Tests->get($id);

        $listExercises = $this->Exercises->find()->contain(['ClientRecords' => function ($q) use ($clientId) {
            return $q->where(['client_id' => $clientId]);
        }, 'Questions'])->where(['test_id' => $id])->toArray();
        foreach ($listExercises as $k => $exercise) {
            if ($exercise['client_records']) {
                $key = count($exercise['client_records']);
                $numCorrectAnswer = $exercise['client_records'][$key - 1]['score'];
                $dateModified = $exercise['client_records'][$key - 1]['modified'];
            } else {
                $numCorrectAnswer = 0;
                $dateModified = "none";
            }
            $listExercises[$k]['progress'] = $numCorrectAnswer . '/' . count($exercise['questions']);
            $listExercises[$k]['progress_bar'] = $numCorrectAnswer / count($exercise['questions']);
            $listExercises[$k]['date_modified'] = $dateModified;
            unset($listExercises[$k]['questions']);
            unset($listExercises[$k]['client_records']);
            unset($dateModified);
        }
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $res['data']['test'] = $test;
        $res['data']['list_exercises'] = $listExercises;

        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewExercise($id)
    {
        $this->loadModel('Exercises');
        $exercise = $this->Exercises->get($id, ['contain' => ['Questions', 'Questions.Answers']]);
        $questions = $exercise->questions;
        unset($exercise->questions);
        foreach ($questions as $k => $question) {
            $questions[$k]->visible = false;
            foreach ($question->answers as $aKey => $answer) {
                $question->answers[$aKey]->visible = false;
            }
        }
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $listTests = $this->Tests->find()->toArray();
        $res['data']['exercise'] = $listTests;
        $res['data']['questions'] = $questions;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function submitExercise()
    {
        $this->loadModel('DoneAnswers');
        $this->loadModel('Answers');
        $this->loadModel('Exercises');
        $this->loadModel('ClientRecords');
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $data = $this->request->getData();
        $scoreCorrect = 0;
        $scoreIncorrect = 0;
        $exercise = $this->Exercises->get($data['exercise_id'], ['contain' => 'Questions']);
        $numbQuestion = count($exercise->questions);
        foreach ($data['done_answers'] as $k => $answer) {
            $doneAnswer = $this->DoneAnswers->find()->where(['client_id' => $data['client_id'], 'exercise_id' => $data['exercise_id'], 'question_id' => $answer['question_id']])->first();
            $correctAnswer = $this->Answers->get($answer['answer_id']);
            if ($correctAnswer->is_true == 1) {
                $scoreCorrect++;
            } else {
                $scoreIncorrect++;
            }

            if ($doneAnswer) {
                $doneAnswer = $this->DoneAnswers->patchEntity($doneAnswer, ['answer_id' => $answer['answer_id']]);
                $this->DoneAnswers->save($doneAnswer);
            } else {
                $doneAnswer = $this->DoneAnswers->newEntity();
                $doneAnswer = $this->DoneAnswers->patchEntity($doneAnswer,
                    ['client_id' => $data['client_id'], 'exercise_id' => $data['exercise_id'], 'answer_id' => $answer['answer_id'], 'question_id' => $answer['question_id']]);
                $this->DoneAnswers->save($doneAnswer);
            }
        }
        $numbCorrectAnswers = $scoreCorrect;
        $numbIncorrectAnswers = $scoreIncorrect;
        $numNotDoneAnswers = $numbQuestion - $numbCorrectAnswers - $numbIncorrectAnswers;
        $clientRecord = $this->ClientRecords->newEntity();
        $clientRecord = $this->ClientRecords->patchEntity($clientRecord, ['client_id' => $data['client_id'], 'exercise_id' => $data['exercise_id'], 'score' => $numbCorrectAnswers]);
        $this->ClientRecords->save($clientRecord);

        $res['data']['correct_answers'] = $numbCorrectAnswers;
        $res['data']['incorrect_answers'] = $scoreIncorrect;
        $res['data']['not_done_answers'] = $numNotDoneAnswers;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewRecentAnswers($clientId)
    {
        $this->loadModel('DoneAnswers');
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $listRencentAnswers = $this->DoneAnswers->find()->contain([
            'Questions',
            'Answers',
            'Exercises'
        ])->where(['client_id' => $clientId])->order('DoneAnswers.modified', 'DESC');
        $lisQuestion = [];
        foreach ($listRencentAnswers as $k => $rencentAnswer) {
            $lisQuestion[] = [
                'done_answer_id' => $rencentAnswer->id,
                'exercise_id' => $rencentAnswer->exercise->id,
                'exercise_content' => $rencentAnswer->exercise->name,
                'question_content' => $rencentAnswer->question->content,
                'answer_content' => $rencentAnswer->answer->content,
                'is_correct' => $rencentAnswer->answer->is_true == 1 ? true : false
            ];
        }
        $res['data'] = $lisQuestion;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewWrongAnswers($clientId)
    {
        $this->loadModel('DoneAnswers');
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $listRencentAnswers = $this->DoneAnswers->find()->contain([
            'Questions',
            'Answers' => function ($q) {
                return $q->where(['is_true' => 0]);
            },
            'Exercises'
        ])->where(['client_id' => $clientId]);
        $lisQuestion = [];
        foreach ($listRencentAnswers as $k => $rencentAnswer) {
            $lisQuestion[] = [
                'done_answer_id' => $rencentAnswer->id,
                'exercise_id' => $rencentAnswer->exercise->id,
                'exercise_content' => $rencentAnswer->exercise->name,
                'question_content' => $rencentAnswer->question->content,
                'answer_content' => $rencentAnswer->answer->content,
                'is_correct' => $rencentAnswer->answer->is_true == 1 ? true : false
            ];
        }
        $res['data'] = $lisQuestion;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }

    public function viewBookmarkQuestion($clientId){
        $this->loadModel('Bookmarks');
        $this->RequestHandler->renderAs($this, 'json');
        $res = ['status' => STT_SUCCESS, 'message' => '', 'data' => []];
        $bookmarks = $this->Bookmarks->find()->contain(['Questions', 'Questions.Exercises'])->where([
            'client_id' => $clientId,
            'item_type' => QUESTION_TYPE,
            'bookmark_type' => LIKE_BOOKMARK
        ]);
        $listBookmark = [];
        foreach($bookmarks as $bookmark){
            $listBookmark[] = [
              'exercise_id' => $bookmark->question->exercise->id,
              'exercise_content' => $bookmark->question->exercise->name,
              'question_id' => $bookmark->question->id,
              'question_content' => $bookmark->question->content,
            ];
        }

        $res['data'] = $listBookmark;
        $this->set([
            'status' => $res['status'],
            'message' => $res['message'],
            'data' => $res['data'],
            '_serialize' => ['status', 'message', 'data']
        ]);
    }
}
