<?php

	class controller {

		public function loadView($viewName, $viewData = array()) {
			extract($viewData);
			require 'views/'.$viewName.'.php';
		}

		public function loadViewInTemplate($viewName, $viewData = array()) {
			extract($viewData);
			require 'views/'.$viewName.'.php';
		}

		public function loadTemplate($viewName, $viewData = array()) {
			extract($viewData);
			require 'views/template.php';
		}

		public function erro_404() {
			$this->loadView('erro_404');
		}

        public function antSql($sql) {
           $sql = str_replace(['SELECT', 'select', 'DELETE', 'delete', 'UPDATE', 'update', 'FROM', 'from', 'UNION', 'union', 'OR', 'or', 'TABLE', 'table', 'DROP', 'drop', 'WHERE', 'where', 'SET', 'set', 'INTO', 'into', 'VALUES', 'values', 'AND', 'and', '#', '/', '//', '(', ')', '()', '!=', '!', '_'], "",  $sql);
	       $sql = trim($sql);
	       $sql = addslashes($sql);
	       $sql = strip_tags($sql);
	       return $sql;
        }

	}

 ?>
