<?php
namespace Controller;

class Task extends \Controller\App
{
	/**
	 * 查看任务信息
	 */
	public function index()
	{
        $this->render('task');
	}

	/**
	 * 修改任务
	 */
	public function modity()
	{
		$task_id = $this->input('task_id', ['type' => 'uuid']);
		try {
			$task = \Model\Entity\Task::findOrFail($task_id);
		} catch(\Exception $ex) {
			throw new \Leno\Http\Exception(400, '没有找到任务');
		}
		$data = [
			'title' => $this->input('title', [
				'type' => 'string', 'extra' => [
					'max_length' => 64
				]
			], '名称应该0-64个字符之间'),
			'descriptioin' => $this->input('description', [
				'type' => 'string', 'extra' => [
					'max_length' => 256
				]
			], '描述应该0-256个字符之间'),
			'requirement' => $this->input('requirement'),
			'min_price' => $this->input('min_price', [
				'type' => 'int', 'extra' => [
					'min' => 0
				]
			], '最低价格不能小于0'),
			'max_price' => $this->input('max_price', [
				'type' => 'int', 'extra' => [
					'min' => 0
				]
			], '最高价格不能小于0'),
			'needed' => $this->input('needed', [
				'type' => 'int', 'extra' => [
					'min' => 0
				]
			], '需要的时间不能小于0'),
		];
		try {
			$task->setAll($data)->save();
		} catch(\Exception $ex) {
			return $this->response->withStatus(500)->write('操作失败');
		}
		return '操作成功';
	}

	/**
	 * 添加新任务
	 */
	public function add()
	{
	}

	/**
	 * 删除任务
	 */
	public function delete()
	{
	}
}
