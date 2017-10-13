<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Test Controller
 *
 * @property \App\Model\Table\TestTable $Test
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class PostsController extends AppController {

    public function index() {
        $posts = $this->Posts
                ->find()
                ->all();
        $this->set(compact(['posts']));
    }

    public function add() {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)):
                $this->uploadPostsPicture($post->id, $this->request->getData('post_image'));
                $this->Flash->success(__('The posts has been saved.'));
                return $this->redirect(['action' => 'index']);
            else:
                $this->Flash->error(__('The posts has been saved.'));
            endif;
        }
    }

    public function view($id) {
        $post = $this->Posts
                ->find()
                ->where(['Posts.id' => $id])
                ->first();
        $this->set(compact(['post']));
    }

    public function delete($id) {
        $post = $this->Posts
                ->find()
                ->where(['Posts.id' => $id])
                ->first();
        if ($this->Posts->delete($post)):
            if ($this->Posts->save($post)):
//                $this->uploadPostsPicture($post->id, $post->image);
                $this->Flash->success(__('The posts has been deleted.'));
            else:
                $this->Flash->error(__('The posts has been deleted.'));
            endif;
        endif;
        return $this->redirect(['action' => 'index']);
    }

    public function edit($id) {
        $post = $this->Posts
                ->find()
                ->where(['Posts.id' => $id])
                ->first();
        if ($this->request->is(['post', 'put'])):
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                if ($this->request->getData('post_image')):
                    $this->uploadPostsPicture($post->id, $this->request->getData('post_image'));
                endif;
                return $this->redirect(['action' => 'index']);
                $this->Flash->success(__('The portfolio has been saved.'));
            }
            $this->Flash->error(__('The portfolio has been saved.'));
        endif;

        $this->set(compact(['post']));
    }

}
