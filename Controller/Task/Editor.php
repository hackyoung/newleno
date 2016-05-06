<?php
namespace Controller\Task;

class Editor extends \Controller\App
{
    public function index()
    {
		$task_id = $this->input('task_id', ['type' => 'uuid', 'required' => false]);
		try {
			$task_id && $task = \Model\Entity\Task::findOrFail($task_id);
		} catch(\Exception $ex) {
            throw new \Leno\Http\Exception(400, '未找到认为');
		}
		$this->setTask($task ?? []);
        $this->render('task.editor');
    }
}
