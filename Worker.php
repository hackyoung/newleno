<?php
class Worker extends \Leno\Worker
{
	public function handleException($e)
	{
		try {
			parent::handleException($e);
		} catch(\Exception $e) {
			if($e instanceof \Model\User\UserException) {
				$this->response->redirect('/login?redirect_url='.$this->request->getUri());
			}
			throw $e;
		}
	}
}
