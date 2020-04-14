<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Excercises Controller
 *
 *
 * @method \App\Model\Entity\Excercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExcercisesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $excercises = $this->paginate($this->Excercises);

        $this->set(compact('excercises'));
    }

    /**
     * View method
     *
     * @param string|null $id Excercise id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $excercise = $this->Excercises->get($id, [
            'contain' => [],
        ]);

        $this->set('excercise', $excercise);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $excercise = $this->Excercises->newEntity();
        if ($this->request->is('post')) {
            $excercise = $this->Excercises->patchEntity($excercise, $this->request->getData());
            if ($this->Excercises->save($excercise)) {
                $this->Flash->success(__('The excercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The excercise could not be saved. Please, try again.'));
        }
        $this->set(compact('excercise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Excercise id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $excercise = $this->Excercises->get($id, [
            'contain' => ['Questions', 'Questions.Answers'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $excercise = $this->Excercises->patchEntity($excercise, $this->request->getData());
            if ($this->Excercises->save($excercise)) {
                $this->Flash->success(__('The excercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The excercise could not be saved. Please, try again.'));
        }
        $this->set(compact('excercise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Excercise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $excercise = $this->Excercises->get($id);
        if ($this->Excercises->delete($excercise)) {
            $this->Flash->success(__('The excercise has been deleted.'));
        } else {
            $this->Flash->error(__('The excercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
