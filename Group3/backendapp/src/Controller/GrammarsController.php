<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grammars Controller
 *
 * @property \App\Model\Table\GrammarsTable $Grammars
 *
 * @method \App\Model\Entity\Grammar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GrammarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lessons'],
        ];
        $grammars = $this->paginate($this->Grammars);

        $this->set(compact('grammars'));
    }

    /**
     * View method
     *
     * @param string|null $id Grammar id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grammar = $this->Grammars->get($id, [
            'contain' => ['Lessons'],
        ]);

        $this->set('grammar', $grammar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grammar = $this->Grammars->newEntity();
        if ($this->request->is('post')) {
            $grammar = $this->Grammars->patchEntity($grammar, $this->request->getData());
            if ($this->Grammars->save($grammar)) {
                $this->Flash->success(__('The grammar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grammar could not be saved. Please, try again.'));
        }
        $lessons = $this->Grammars->Lessons->find('list', ['limit' => 200]);
        $this->set(compact('grammar', 'lessons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grammar id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grammar = $this->Grammars->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grammar = $this->Grammars->patchEntity($grammar, $this->request->getData());
            if ($this->Grammars->save($grammar)) {
                $this->Flash->success(__('The grammar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grammar could not be saved. Please, try again.'));
        }
        $lessons = $this->Grammars->Lessons->find('list', ['limit' => 200]);
        $this->set(compact('grammar', 'lessons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grammar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grammar = $this->Grammars->get($id);
        if ($this->Grammars->delete($grammar)) {
            $this->Flash->success(__('The grammar has been deleted.'));
        } else {
            $this->Flash->error(__('The grammar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
