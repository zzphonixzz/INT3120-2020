<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exercises Controller
 *
 * @property \App\Model\Table\ExercisesTable $Exercises
 * @property \App\Model\Table\TestsTable $Tests
 *
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExercisesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tests'],
        ];
        $exercises = $this->paginate($this->Exercises);

        $this->set(compact('exercises'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exercise = $this->Exercises->get($id, [
            'contain' => ['Tests', 'Questions'],
        ]);

        $this->set('exercise', $exercise);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Tests');
        $tests = $this->Tests->find();
        $exercise = $this->Exercises->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            foreach($data['questions'] as $k => $question){
                $data['questions'][$k]['answers'][intval($question['answers']['is_true'])]['is_true'] = 1;
                unset($data['questions'][$k]['answers']['is_true']);
            }
            $exercise = $this->Exercises->patchEntity($exercise, $data, ['associated' => ['Questions.Answers']]);
            if ($this->Exercises->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
//        $tests = $this->Exercises->Tests->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'tests'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Tests');
        $exercise = $this->Exercises->get($id, [
            'contain' => ['Questions', 'Questions.Answers'],
        ]);
        $tests = $this->Tests->find();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
//            dd($data);
            foreach($data['questions'] as $k => $question){
                $data['questions'][$k]['answers'][intval($question['answers']['is_true'])]['is_true'] = 1;
                unset($data['questions'][$k]['answers']['is_true']);
            }
//            dd($data); choti
            $exercise = $this->Exercises->patchEntity($exercise, $data, ['associated' => ['Questions.Answers']]);
            if ($this->Exercises->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
//        $tests = $this->Exercises->Tests->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'tests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercises->get($id);
        if ($this->Exercises->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
