<?php
	function catlist($cat) {
		$category = array(
			'rev' => 24,	//review
			'ep' => 3,		//episode blogging
			'an' => 2,		//announcement
			'fe' =>	6,		//features
			'pod'=> 22,		//podcast
			'eve'=> 4	//event
		);
		
		return $category[$cat];
	}
?>