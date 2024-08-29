<?php

namespace core;

class Pagination{

	public $count_pages = 1;
	public $current_page = 1;
	public $page;
	public $per_page;
	public $total;

	public function __construct($page = 1, $per_page = 1, $total = 1){
		$this->page = $page;
		$this->per_page = $per_page;
		$this->total = $total;

		$this->count_pages = $this->getCountPages();
		$this->current_page = $this->getCurrentPage();
	}

	private function getCountPages(){
        return ceil($this->total / $this->per_page) ?: 1;
    }

    private function getCurrentPage(){
        if ($this->page < 1) {
            $this->page = 1;
        }
        if ($this->page > $this->count_pages) {
            $this->page = $this->count_pages;
        }
        return $this->page;
    }

    public function getStart(){
        return ($this->current_page - 1) * $this->per_page;
    }

    public function getHtml(){
        $pages = '';
        if($this->total > $this->per_page){
            for($i = 1; $i <= $this->count_pages; $i++){
                $pages .= "<li><a href='?page=$i'>$i</a></li>";
            }
        }  
        return '<ul>' . $pages . '</ul>';
    }


    public function __toString(){
        return $this->getHtml();
    }
}